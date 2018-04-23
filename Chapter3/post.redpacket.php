<?php
require '../../common.des.inc.php';
function newDie($msg){
	global $db,$tag,$des;
	$db->close();
	$tag['msg'] = $msg;
	die($des->encrypt(json_encode($tag)));
}
// require '../../common.inc.php';
// $paramData = isset($paramData)? trim($paramData): '';
// $paramData = strpos($paramData,'%')?urldecode($paramData):$paramData;
// $paramData = strpos($paramData,'%')?urldecode($paramData):$paramData;
// $paramArr = explode(",",$paramData);
// function newDie($msg) {
// 	global $db,$tag,$des;
// 	$db->close();
// 	$tag['msg'] = $msg;
// 	die(json_encode($tag));
// }
$tag['status'] = 0;
$tag['time'] = $DT_TIME;
if(abs($paramArr[0] - $DT_TIME) > 60) {
	newDie('时间过期');
}
if(count($paramArr) < 3) {
	newDie('参数数量错误');
}
$uid = isset($paramArr[1])? intval($paramArr[1]): 0;//用户ID
$auth = trim($paramArr[2]);//auth
if (checklogin($uid, $auth)) {
	$memcache = getMemcache();
	$system_key = 'system_info';
	$SYS = $memcache->get($system_key);
	if ($uid == 341) {
		// $tag['tttttt'] = $sys_time;
		// newDie('信息错误');
	}
	if (!$SYS) {
		$SYS = $db->get_one("SELECT * FROM b_1_system WHERE id=1");//系统配置要求的信息
		if ($SYS) {
			$memcache->set($system_key, $SYS, false, 0);//永久设置系统相关配置信息.
		} else {
			newDie('网络繁忙，请稍后再试！');
		}
	}	
	$sys_time = ($SYS['show_time'] + rand(-10, 30)) * 60;//系统红包单次抢红包的时间秒数
	$once_time = $SYS['once_time'] * 60;//非系统红包单次抢红包的时间秒数
	$money_min = $SYS['money_min'] * 10000;//系统红包最少钱数
	$money_max = $SYS['money_max'] * 10000;//系统红包最大钱数

	$tag['tax_rate'] = $SYS['tax_rate'] * 100 . '%';//系统抽取利率
	if ($SYS['is_check']) {// 是否开启审核模式
		$where_add = ' AND is_check=1 ';//ad表审核状态为通过的红包才显示.
	} else {
		$where_add = '';
	}
	switch ($action) {
		case 'list'://获取红包列表
			// start 系统红包
			if(count($paramArr) < 5) {
				newDie('参数数量错误');
			}
			$lat = trim($paramArr[3]);//40.0802800000;//用户定位坐标纬度
			$lng = trim($paramArr[4]);//116.3549900000;//用户定位坐标经度
			$tag['user_length'] = $_range;//用户红包范围
			// $tag['user_money'] = 0;//
			$zuobiao = getAround($lng, $lat, $tag['user_length'] / 2);//坐标上限和下限
			$zuobiao = array_map(function($n){return $n*10000000;}, $zuobiao);//坐标上限和下限
			extract($zuobiao);//$minLat, $maxLat, $minLng, $maxLng	

			$price_num_str = 'stock_price_num';//当前股数和股价单位命名
			$price_num_now = $memcache->get($price_num_str);//当前股数和股价
			if (!$price_num_now) {//当前股价
				$stock_now = $db->get_one("SELECT num,price FROM b_1_stock WHERE id=1");
				$tag['worth'] = round($stock_now['price'] * $_stock, 8);
			} else {
				$tag['worth'] = round($price_num_now['price'] * $_stock, 8);
			}
			$tag['worth'] = "{$tag['worth']}";
			$systemrp = 'redpacket' . 'system' . $uid;//用户系统红包个数.
			$value = $memcache->get($systemrp);
			$tag['system_red'] = array();
			if (!$value) {
				$memcache->set($systemrp, ceil($_range/1000) + 2, false, $sys_time);
				$value = ceil($_range/1000) + 2;
			}
			if ($value) {//如果用户有系统红包
				$tag['system_red_count'] = $value - 1;//系统红包数量
				if ($value > 1) {
					for ($i = 0; $i < $tag['system_red_count']; $i++) {
						$tag['system_red'][$i]['avatar'] = avatar_ad(1);//DT_PATH . 'file/upload/weixin/' . ceil(1/1000) . '/' . md5(1) . '.jpg';
						$tag['system_red'][$i]['nickname'] = '来捡钱';
						$tag['system_red'][$i]['id'] = 1;
						$tag['system_red'][$i]['rand_lat'] = (mt_rand($minLat, $maxLat) / 10000000);
						$tag['system_red'][$i]['rand_lng'] = (mt_rand($minLng, $maxLng) / 10000000);
					}
				}
			}
			//end 系统红包
			//start 非系统红包
			//领过的红包不在出现 memcache 存半小时，领取过的红包，如果超过没人领取，则继续领取。
			$res = $db->query("SELECT *,(6378137.0*ACOS(SIN($lat/180*PI())*SIN(lat/180*PI())+COS($lat/180*PI())*COS(lat/180*PI())*COS(($lng-Lng)/180*PI()))) AS distance FROM b_1_ad_valid WHERE num<>user_num AND ad_type=2 $where_add");//查询非系统红包。 HAVING distance>{$tag['user_length']}
			$tag['user_red'] = $list = array();
			while ($r = $db->fetch_array($res)) {
				$receive_redpacket = $uid . 'redpacket' . 'once' . $r['id'];//单次广告红包时间.
				//用户半径+红包半径 >= 两点距离,就包含在内.
				if (!$memcache->get($receive_redpacket) && ($r['distance'] <= $r['range'] + $tag['user_length']/2)) { //圆心距> 两点间距离就可以得红包
					if (($tag['user_length']/2) >= $r['distance']) {//圆心距小于两点之间距离,随机坐标.
						$list['lat'] = $r['lat'];
						$list['lng'] = $r['lng'];
					} else {
						$list['lat'] = (mt_rand($minLat, $maxLat) / 10000000);
						$list['lng'] = (mt_rand($minLng, $maxLng) / 10000000);
					}
					$list['id'] = $r['id'];
					$list['avatar'] = avatar_ad($r['uid']);//DT_PATH . 'file/upload/weixin/' . ceil($r['uid']/1000) . '/' . md5($r['uid']) . '.jpg';
					$list['nickname'] = $r['nickname'];
					$list['addtime'] = $r['is_password']? $r['addtime'] + 300: $r['addtime'];
					$list['ad_type'] = $r['ad_type'];
					$list['is_password'] = ($r['addtime'] + 300) > $DT_TIME? $r['is_password']: "0";
					$list['type'] = $r['type'];
					$tag['user_red'][] = $list;
				}
			}
			//end 非系统红包.
			// if ($uid != 341) {
			// 	$tag['system_red'] = array();
			// }
			$memcache->close();
			$tag['status'] = 1;
			newDie('获取成功');
		break;
		case 'open';//开红包 time,uid,auth,ad_type,
			if (count($paramArr) < 5) {
				newDie("参数错误！");
			}
			$my_ad_id = "0";
			$tag['img1'] = '';
			$tag['img2'] = '';
			$tag['img3'] = '';
			$tag['bless'] = '';
			$adid = intval($paramArr[3]);//红包id
			$password = md5(trim($paramArr[4]));//红包密码
			$ad = array('收到广告红包', '邀请奖励分红');

			$redpacket = $db->get_one("SELECT * FROM b_1_ad WHERE id=$adid $where_add");
			if ($redpacket) {
				$message = '';
				$chenggong = 0;

				if ($redpacket['ad_type'] == 1) {//系统红包
					$systemrp = 'redpacket' . 'system' . $uid;//系统红包个数.
					$mynum = $memcache->get($systemrp);
					if (!$mynum) {//超过30分钟
						$mynum = ceil($_range/1000) + 1 - 1;
						$memcache->set($systemrp, $mynum, false , $sys_time);
					} elseif($mynum > 1) {//还有一些没有领取,减1操作
						$memcache->decrement($systemrp);
					} else {//意外和领完的情况
						$memcache->close();
						newDie("红包已领完了！");
					}
					$money = sprintf("%.4f", (rand($money_min, $money_max) / 10000));
					if ($money > $redpacket['money']) {//红包已经抢完
						$memcache->close();
						newDie("红包已经抢完了！");
					} else {
						$price_num_str = 'stock_price_num';//当前股数和股价单位命名
						$price_num_now = $memcache->get($price_num_str);//当前股数和股价
						if (!$price_num_now) {
							$stock_now = $db->get_one("SELECT num,price FROM b_1_stock WHERE id=1");
							$price_num_now['price'] = $stock_now['price'];
							$price_num_now['num'] = $stock_now['num'];
						}
						$price_now = $price_num_now['price'];//当前总股数
						$num_now = $price_num_now['num'];//当前股价
						//arr array('price' => 当前股价,'num' => 当前股数, 'num_a' => A增长股数,'num_c' => C增长股数, 'money_a' => a的钱, 'money_c' => c的钱);
						$arr = redshare($money, $num_now, $price_now, $_to_uid);
						// if (round($price_num_now['price'], 8) == round($arr['price'], 8)) {
						// 	$history = 0;
						// } else {
						// 	$history = 1;
						// }
						$price_num_now['price'] = $arr['price'];
						$price_num_now['num'] = $arr['num'];
						//更新当前股价和股数
						$db->query("SET autocommit=0");//先关闭自动提交
						$res1 = $db->query("UPDATE b_1_stock SET `num`={$arr['num']},`price`={$arr['price']},total=`num`*`price`  WHERE id=1");
						// if ($history) {
						$res2 = $db->query("INSERT INTO  b_1_stock_history (price,num,addtime) values ({$arr['price']},{$arr['num']},$DT_TIME)");	
						// } else {
						// 	$res2 = true;
						// }
						//更新A用户相关信息
						$res3 = $db->query("UPDATE b_1_user SET receive_ad=receive_ad+{$arr['money_a']},stock=stock+{$arr['num_a']},edittime=$DT_TIME WHERE uid=$uid");
						//更新C用户相关信息
						if ($_to_uid) {
							$res4 = $db->query("UPDATE b_1_user SET receive_ad=receive_ad+{$arr['money_c']},stock=stock+{$arr['num_c']},edittime=$DT_TIME WHERE uid=$_to_uid");
						} else {
							$res4 = true;
						}
						//更新红包相关信息
						$res5 = $db->query("UPDATE b_1_ad SET user_money=user_money-$money,user_num=user_num+1,edittime=$DT_TIME WHERE id=$adid");
						$res6 = $db->query("UPDATE b_1_ad_valid SET user_money=user_money-$money,user_num=user_num+1,edittime=$DT_TIME WHERE id=$adid");
						//入我的中奖纪录
						$res7 = $db->query("INSERT INTO b_1_my_ad (uid,nickname,money,num,from_uid,from_nickname,ad_id,ad_type,type,ad_img,ad_text,ad_bless,addtime) VALUES ($uid,'$_nickname',{$arr['money_a']},{$arr['num_a']},{$redpacket['uid']},'{$redpacket['nickname']}',{$redpacket['id']},{$redpacket['ad_type']},{$redpacket['type']},'{$redpacket['ad_img1']}','{$redpacket['ad_text']}','',$DT_TIME)");
						$my_ad_id = $db->insert_id();
						if ($my_ad_id) {
							$res8 = $db->query("INSERT INTO b_1_my_ad_" . $uid%10 . " (id,uid,nickname,money,num,from_uid,from_nickname,ad_id,ad_type,type,ad_img,ad_text,ad_bless,addtime) VALUES ($my_ad_id,$uid,'$_nickname',{$arr['money_a']},{$arr['num_a']},{$redpacket['uid']},'{$redpacket['nickname']}',{$redpacket['id']},{$redpacket['ad_type']},{$redpacket['type']},'{$redpacket['ad_img1']}','{$redpacket['ad_text']}','',$DT_TIME)");
						} else {
							$res8 = false;
						}
						
						if ($_to_uid) {
							$res9 = $db->query("INSERT INTO b_1_invite (uid,from_uid,money,num,type,addtime) VALUES ($_to_uid,$uid,{$arr['money_c']},{$arr['num_c']},1,$DT_TIME)");
							$invite_id = $db->insert_id();
							if ($invite_id) {
								$res10 = $db->query("INSERT INTO b_1_invite_" . $uid%10 . "  (id,uid,from_uid,money,num,type,addtime) VALUES ($invite_id,$_to_uid,$uid,{$arr['money_c']},{$arr['num_c']},1,$DT_TIME)");
							} else {
								$res10 = false;
							}							
						} else {
							$res9 = $res10 = 1;
						}
						$res11 = $db->query("INSERT INTO b_1_my_record  (uid,money,num,title,type,addtime) VALUES ($uid,{$arr['money_a']},{$arr['num_a']},'{$ad[0]}',1,$DT_TIME),($_to_uid,{$arr['money_c']},{$arr['num_c']},'{$ad[1]}',3,$DT_TIME)");
						//执行事务
						if ($res1 && $res2 && $res3 && $res4 && $res5 && $res6 && $res7 && $res8 && $res9 && $res10 && $res11) {
							$db->query("COMMIT"); //提交事务
							$db->query("SET autocommit=1"); //开启自动提交功能
							$chenggong = 1;
							$db->query("DELETE FROM b_1_ad_valid WHERE num=0");//删除领取完的红包
							$memcache->set($price_num_str, $price_num_now, false, 0);//事务成功,更新当前缓存
						} else {//事务回滚
							$db->query("ROLLBACK");
							newDie('红包飞了，请重新打开！');
						}
					}
				} elseif($redpacket['ad_type'] == 2) {//非系统红包
					$user_num_key = 'ad_open_num_' . $adid;//剩余数量KEY
					$user_num = $memcache->get($user_num_key);//取出剩余数量
					if (!$user_num || $user_num == 1) {//默认设置 红包数量+1
						if ($user_num == 1) {
							$memcache->delete($user_num_key);
						}
						newDie("红包已经抢完了！");
					} else {
						if ($redpacket['user_money'] > 0 && $user_num > 1) {
							if ($redpacket['is_password']){//如果带密码
								if ($DT_TIME < ($redpacket['addtime'] + 300)) {//没有超市的密码保
									$pd_key = 'password' . $uid . 'ad' . $adid;
									if ($memcache->get($pd_key)) {
										if ($memcache->get($pd_key) > 2) {
											$memcache->close();
											newDie("休息一会吧！");
										}
										$memcache->increment($pd_key);
									} else {
										$memcache->set($pd_key, 1, false, 60);
									}
									if ($password != $redpacket['password']) {//并且密码相同.
										$memcache->close();
										newDie("密码错误！");
									}									
								}
							}
							//随机派发钱
							if ($user_num > 1) {
								$memcache->
								$money = usergrab($redpacket['user_money'], $user_num - 1);
								if ($money) {
									$money = sprintf("%.4f", $money);
								} else {
									$money = 0.01;//最少派发0.01
								}
							} elseif ($user_num == 1) {
								$money = sprintf("%.4f", $redpacket['user_money']);
							} else {
								$memcache->close();
								newDie('信息错误！');
							}						
							//memcache 创建30分钟key
							$receive_redpacket = $uid . 'redpacket' . 'once' . $adid;//单次广告红包时间.
							if ($memcache->get($receive_redpacket)) {
								$memcache->close();
								newDie("已经领过这个红包了！");
							}
							$memcache->set($receive_redpacket, 1, false, $once_time);					
							$tag['img1'] = $redpacket['ad_img1'];
							$tag['img2'] = $redpacket['ad_img2'];
							$tag['img3'] = $redpacket['ad_img3'];
							if ($redpacket['type'] == 2) {
								$tag['bless'] = '祝福是不可能祝福的 这辈子都不可能祝福的。';
							}						
							$price_num_str = 'stock_price_num';//当前股数和股价单位命名
							$price_num_now = $memcache->get($price_num_str);//当前股数和股价
							if (!$price_num_now) {
								$stock_now = $db->get_one("SELECT num,price FROM b_1_stock WHERE id=1");
								$price_num_now['price'] = $stock_now['price'];
								$price_num_now['num'] = $stock_now['num'];
							}
							$price_now = $price_num_now['price'];//当前总股数
							$num_now = $price_num_now['num'];//当前股价
							//arr array('price' => 当前股价,'num' => 当前股数, 'num_a' => A增长股数,'num_c' => C增长股数, 'money_a' => a的钱, 'money_c' => c的钱);
							$arr = redshare($money, $num_now, $price_now, $_to_uid);
							// if (round($price_num_now['price'], 8) == round($arr['price'], 8)) {
							// 	$history = 0;
							// } else {
							// 	$history = 1;
							// }
							$price_num_now['price'] = $arr['price'];
							$price_num_now['num'] = $arr['num'];
							$db->query("SET autocommit=0");//先关闭自动提交
							// $db->query("BEGIN");//事务开启
							//更新当前股价和股数
							$res1 = $db->query("UPDATE b_1_stock SET `num`={$arr['num']},`price`={$arr['price']},total=`num`*`price` WHERE id=1");
							// if ($history) {
							$res2 = $db->query("INSERT INTO  b_1_stock_history (price,num,addtime) values ({$arr['price']},{$arr['num']},$DT_TIME)");	
							// } else {
							// 	$res2 = true;
							// }
							//更新A用户相关信息
							$res3 = $db->query("UPDATE b_1_user SET receive_ad=receive_ad+{$arr['money_a']},stock=stock+{$arr['num_a']},edittime=$DT_TIME WHERE uid=$uid");
							//更新C用户相关信息
							if ($_to_uid) {
								$res4 = $db->query("UPDATE b_1_user SET receive_ad=receive_ad+{$arr['money_c']},stock=stock+{$arr['num_c']},edittime=$DT_TIME WHERE uid=$_to_uid");
							} else {
								$res4 = true;
							}	
							//更新红包
							$res5 = $db->query("UPDATE b_1_ad SET user_money=user_money-$money,user_num=user_num+1,edittime=$DT_TIME WHERE id=$adid");
							$res6 = $db->query("UPDATE b_1_ad_valid SET user_money=user_money-$money,user_num=user_num+1,edittime=$DT_TIME WHERE id=$adid");
							//插入领取数据
							$res7 = $db->query("INSERT INTO b_1_my_ad (uid,nickname,money,num,from_uid,from_nickname,ad_id,ad_type,type,ad_img,ad_text,ad_bless,addtime) VALUES ($uid,'$_nickname',{$arr['money_a']},{$arr['num_a']},{$redpacket['uid']},'{$redpacket['nickname']}',{$redpacket['id']},{$redpacket['ad_type']},{$redpacket['type']},'{$redpacket['ad_img1']}','{$redpacket['ad_text']}','',$DT_TIME)");
							$my_ad_id = $db->insert_id(); 
							if ($my_ad_id) {
								$res8 = $db->query("INSERT INTO b_1_my_ad_" . $uid%10 . " (id,uid,nickname,money,num,from_uid,from_nickname,ad_id,ad_type,type,ad_img,ad_text,ad_bless,addtime) VALUES ($my_ad_id,$uid,'$_nickname',{$arr['money_a']},{$arr['num_a']},{$redpacket['uid']},'{$redpacket['nickname']}',{$redpacket['id']},{$redpacket['ad_type']},{$redpacket['type']},'{$redpacket['ad_img1']}','{$redpacket['ad_text']}','',$DT_TIME)");
							} else {
								$res8 = false;
							}							
							
							//关联邀请人的数据
							if ($_to_uid) {
								$res9 = $db->query("INSERT INTO b_1_invite (uid,from_uid,money,num,type,addtime) VALUES ($_to_uid,$uid,{$arr['money_c']},{$arr['num_c']},1,$DT_TIME)");
								$invite_id = $db->insert_id();
								if ($invite_id) {
									$res10 = $db->query("INSERT INTO b_1_invite_" . $uid%10 . "  (id,uid,from_uid,money,num,type,addtime) VALUES ($invite_id,$_to_uid,$uid,{$arr['money_c']},{$arr['num_c']},1,$DT_TIME)");
								} else {
									$res10 = false;
								}
							} else {
								$res9 = $res10 = 1;
							}
							$res11 = $db->query("INSERT INTO b_1_my_record  (uid,from_uid,money,num,title,type,addtime) VALUES ($uid,0,{$arr['money_a']},{$arr['num_a']},'{$ad[0]}',1,$DT_TIME),($_to_uid,$uid,{$arr['money_c']},{$arr['num_c']},'{$ad[1]}',3,$DT_TIME)");
							//执行事务
							if ($res1 && $res2 && $res3 && $res4 && $res5 && $res6 && $res7 && $res8 && $res9 && $res10 && $res11) {
								$db->query("COMMIT"); //提交事务
								$db->query("SET autocommit=1"); //开启自动提交功能
								$chenggong = 1;
								$db->query("DELETE FROM b_1_ad_valid WHERE num=0");//删除领取完的红包
								$memcache->set($price_num_str, $price_num_now, false, 0);//事务成功,更新当前缓存
								$memcache->decrement($user_num_key);//更新打开红包数量
							} else {//事务回滚
								$db->query("ROLLBACK");
								$tag['message'] = '服务器开了个小差，请稍后再试';
								newDie('系统繁忙，请稍后再试！');
							}
						} else {
							$money = 0;
							newDie('红包已经抢完了！');
						}
					}
				} else {
					$memcache->close();
					newDie("网络错误，请稍后再试！");
				}
				$tag['avatars'] = $imgs = array();//头像列表
				$result = $db->query("SELECT uid FROM b_1_my_ad WHERE ad_id=$adid ORDER BY addtime DESC limit 6");
				while ($r = $db->fetch_array($result)) {
					$imgs[] = DT_PATH . 'file/upload/weixin/' . ceil($r['uid']/1000) . '/' . md5($r['uid']) . '.jpg';
				}
				// $tag['redpacket_range'] = ($redpacket['ad_type'] == 1)? '全国': $redpacket['range'] . '米';
				// $tag['is_comment'] = $redpacket['is_comment'];//留言开关
				// $tag['msg_count'] = $db->count('b_1_ad_comment', " ad_id=$adid ");//留言数量
				// $tag['ad_count'] = $db->count('b_1_my_ad', " ad_id=$adid");//广告领取数量
				// $tag['avatars'] = $imgs;
				// $tag['ad_text'] = $redpacket['ad_text'];
				$tag['ad_type'] = $redpacket['ad_type'];//红包级别
				// $tag['ad_nickname'] = $redpacket['nickname'];//红包级别
				// $tag['ad_avatar'] = avatar_ad($redpacket['uid']);//发送人头像
				$tag['type'] = $redpacket['type'];//红包类型
				// $tag['money'] = "$money";//红包金额
				// $tag['message'] = $message;//红包金额
				// $tag['num'] = isset($arr['num_a'])? "{$arr['num_a']}": "0";//红包股数
				$tag['myad_id'] = $my_ad_id;//传过去详情ID
				$tag['status'] = 1;
				$memcache->close();
				newDie('成功');
			}
			$memcache->close();
			newDie("红包已领完！");
		break;
		default:
			newDie('信息错误！');
		break;
	}
} else {
	$tag['status'] = 2;
	newDie("您没有登录！");
}
/**
*计算某个经纬度的周围某段距离的正方形的四个点
*在lat和lng上建立一个联合索引后,使用此项查询
* @param lng float 经度
* @param lat float 纬度
* @param distance float 该点所在圆的半径，该圆与此正方形内切，默认值为3千米
* @return array 正方形的四个点的经纬度坐标
**/
function returnSquarePoint($lng,$lat){
	//地球的半径是6371
	$distance = 1;//1公里范围
  	$dlng = 2*asin(sin($distance / (2 * 6371)) / cos(deg2rad($lat)));
  	$dlng = rad2deg($dlng);

  	$dlat = $distance/6371;
  	$dlat = rad2deg($dlat);

 //  	return array(
	// 	'left_top'=>array('lat'=>$lat + $dlat,'lng'=>$lng - $dlng),
	// 	'right_top'=>array('lat'=>$lat + $dlat,'lng'=>$lng + $dlng),
	// 	'left_bottom'=>array('lat'=>$lat - $dlat,'lng'=>$lng - $dlng),
	// 	'right_bottom'=>array('lat'=>$lat - $dlat,'lng'=>$lng + $dlng),
	// );
	return array(		
		'minlat'=> $lat - $dlat,
		'maxlat'=> $lat + $dlat,
		'mixlng'=> $lng - $dlng,
		'maxlng'=> $lng + $dlng
	);
}
/**
* 随机红包的金额生产 
* @param total float 总金额
* @param num float 数量
* @param min float 每个人最少能收到0.01元  
* @return float 随机钱
**/
function usergrab($total, $num, $min = 0.01)//随机生成红包
{
	$total;//红包总额
	$num;// 分成10个红包，支持10人随机领取 

	for ($i=1; $i<$num; $i++) {
		$safe_total = ($total-($num-$i)*$min)/($num-$i);//随机安全上限  
		$money = mt_rand($min*100,$safe_total*100)/100;
		$total = $total-$money;
		$arr['res'][$i] = array(
			'i' => $i,
			'money' => $money,
			'total' => $total
		);
	} 
	$arr['res'][$num] = array('i'=>$num,'money'=>$total,'total'=>0);
	return $arr['res'][rand(1,$num)]['money'];
}
/**
* 获取坐标值. 
* @param lon float 经度
* @param lat float 纬度
* @param raidus int 米  
* @return array 最小最大 经纬度.
**/
function getAround($lon,$lat,$raidus){
	$raidus = $raidus * 0.7;
    $pai = 3.14159265;
    $degree = (24901*1609)/360.0;
    $dpmLat = 1/$degree;
    $radiusLat = $dpmLat*$raidus;
    $minLat = $lat - $radiusLat;
    $maxLat = $lat + $radiusLat;
    $mpdLng = $degree*cos($lat * ($pai/180));
    $dpmLng = 1 / $mpdLng;
    $radiusLng = $dpmLng*$raidus;
    $minLng = $lon - $radiusLng;
    $maxLng = $lon + $radiusLng;
	// return array(//修正误差圈内
	// 	'minLng' => $minLng + 0.001,
	// 	'maxLng' => $maxLng - 0.001,
	// 	'minLat' => $minLat + 0.001,
	// 	'maxLat' => $maxLat - 0.001,
	// );
	return array(
		'minLng' => $minLng,
		'maxLng' => $maxLng,
		'minLat' => $minLat,
		'maxLat' => $maxLat,
	);
}
/**
 * [redshare description]
 * @param  money 投入资金 
 * @param  num 股数
 * @param  price 股价
 * @param  toid 是否有邀请人
 * @param   股值
**/
function redshare($money, $num, $price, $toid) {
	$money_b = $money * 0.1;//10%分享资金
	$money_a = $money - $money_b;//剩余资金
	$price_now = $price + ($money_b/$num);//B10%钱提升当前股价
	if ($toid) {
		$money_c = $money_a * 0.03;//分给c3%的钱
		if ($money_c > 1) {//大于1元则,最多分1元.
			$money_c = 1;
		}
	} else {
		$money_c = 0;
	}
	$money_a = $money_a - $money_c;
	$num_a = $money_a / $price_now;//a股数
	$num_c = $money_c / $price_now;//c股数
	$num = $num + $num_a + $num_c;//总股数
	$price_now = round($price_now, 8);
	$money_c = round($money_c, 4);
	$money_a = round($money_a, 4);
	$num_a = round($num_a, 8);
	$num_c = round($num_c, 8);
	$num = round($num, 8);

	return array('price' => $price_now,'num' => $num, 'num_a' => $num_a,'num_c' => $num_c, 'money_a' => $money_a, 'money_c' => $money_c);	
}
function dump($a){
	echo '<pre>';
	var_dump($a);
	echo '</pre>';
}
?>