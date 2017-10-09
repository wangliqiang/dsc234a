<!doctype html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="Keywords" content="<?php echo $this->_var['keywords']; ?>" />
<meta name="Description" content="<?php echo $this->_var['description']; ?>" />

<title><?php echo $this->_var['page_title']; ?></title>



<link rel="shortcut icon" href="favicon.ico" />
<?php echo $this->fetch('library/js_languages_new.lbi'); ?>
<link rel="stylesheet" type="text/css" href="themes/<?php echo $GLOBALS['_CFG']['template']; ?>/css/user.css">
<link rel="stylesheet" type="text/css" href="js/perfect-scrollbar/perfect-scrollbar.min.css" />
<link rel="stylesheet" type="text/css" href="js/calendar/calendar.min.css" />
<?php if ($this->_var['action'] == 'profile'): ?>
<link rel="stylesheet" type="text/css" href="js/amazeui/amazeui.min.css" />
<link rel="stylesheet" type="text/css" href="js/cropper/cropper.css" />
<?php endif; ?>
<?php echo $this->smarty_insert_scripts(array('files'=>'user.js,kauidiWindow.js')); ?>
</head>

<body>
<?php echo $this->fetch('library/page_header_common.lbi'); ?>
<div class="user-content clearfix">
    <div class="user-side" ectype="userSide">
        <div class="user-perinfo-ny">
            <div class="profile clearfix">
                <div class="avatar">
                    <a href="user.php" class="u-pic">
                        <img src="<?php if ($this->_var['user_default_info']['user_picture']): ?><?php echo $this->_var['user_default_info']['user_picture']; ?><?php else: ?>themes/<?php echo $GLOBALS['_CFG']['template']; ?>/images/touxiang.jpg<?php endif; ?>" alt="">
                    </a>
                </div>
                <div class="name">
                    <h2><?php echo $this->_var['user_default_info']['nick_name']; ?></h2>
                    <div class="user-rank user-rank-1"><?php echo $this->_var['user_default_info']['rank_name']; ?></div>
                </div>
            </div>
        </div>
        <div class="user-mod">
            <?php echo $this->fetch('library/user_menu.lbi'); ?>
        </div>
    </div>
    <div class="user-main" ectype="userMain">
        <div class="user-crumbs hide">
            <?php echo $this->fetch('library/ur_here.lbi'); ?>
        </div>
        
        
        <?php if ($this->_var['action'] == 'profile'): ?>
        <div class="user-mod user-profile">
            <div class="user-title">
                <h2><?php echo $this->_var['lang']['profile']; ?></h2>
            </div>
            <div class="user-profile-info">
                <div class="user-items">
                    <form name="formEdit" action="user.php" method="post">
                        <div class="item">
                            <div class="label"><?php echo $this->_var['lang']['username']; ?>：</div>
                            <div class="value"><span class="txt-lh2"><?php echo $this->_var['profile']['user_name']; ?></span></div>
                        </div>
                        <div class="item">
                            <div class="label"><?php echo $this->_var['lang']['nick_name']; ?>：</div>
                            <div class="value">
                                <input name="nick_name" type="text" value="<?php echo $this->_var['profile']['nick_name']; ?>" class="text text-1" />
                                <div class="notic"></div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="label"><?php echo $this->_var['lang']['Birthday_user']; ?>：</div>
                            <div class="value">
                                <div id="birthdayYear" class="imitate_select w90 mr10">
                                    <div class="cite"><span><?php if ($this->_var['profile']['year']): ?><?php echo $this->_var['profile']['year']; ?><?php else: ?>请选择<?php endif; ?></span><i class="iconfont icon-down"></i></div>
                                    <ul>
                                        <?php $_from = $this->_var['select_date']['year']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'year');if (count($_from)):
    foreach ($_from AS $this->_var['year']):
?>
                                        <li><a href="javascript:void(0);" data-value="<?php echo $this->_var['year']; ?>"><?php echo $this->_var['year']; ?></a></li>
                                        <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
                                    </ul>
                                    <input type="hidden" name="birthdayYear" value="<?php echo $this->_var['profile']['year']; ?>" id="birthdayYear_val"/>
                                </div>
                                <div class="imitate_select w80 mr10">
                                    <div class="cite"><span><?php if ($this->_var['profile']['month']): ?><?php echo $this->_var['profile']['month']; ?><?php else: ?>请选择<?php endif; ?></span><i class="iconfont icon-down"></i></div>
                                    <ul>
                                        <?php $_from = $this->_var['select_date']['month']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'month');if (count($_from)):
    foreach ($_from AS $this->_var['month']):
?>
                                        <li><a href="javascript:void(0);" data-value="<?php echo $this->_var['month']; ?>"><?php echo $this->_var['month']; ?></a></li>
                                        <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
                                    </ul>
                                    <input type="hidden" name="birthdayMonth" value="<?php echo $this->_var['profile']['month']; ?>"/>
                                </div>
                                <div class="imitate_select w80">
                                    <div class="cite"><span><?php if ($this->_var['profile']['day']): ?><?php echo $this->_var['profile']['day']; ?><?php else: ?>请选择<?php endif; ?></span><i class="iconfont icon-down"></i></div>
                                    <ul>
                                        <?php $_from = $this->_var['select_date']['day']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'data_0_66628400_1507431355');if (count($_from)):
    foreach ($_from AS $this->_var['data_0_66628400_1507431355']):
?>
                                        <li><a href="javascript:void(0);" data-value="<?php echo $this->_var['data_0_66628400_1507431355']; ?>"><?php echo $this->_var['data_0_66628400_1507431355']; ?></a></li>
                                        <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
                                    </ul>
                                    <input type="hidden" name="birthdayDay" value="<?php echo $this->_var['profile']['day']; ?>"/>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="label"><?php echo $this->_var['lang']['sex_user']; ?>：</div>
                            <div class="value">
                                <div class="radio-item">
                                    <input type="radio" <?php if ($this->_var['profile']['sex'] == 1): ?> checked="checked" <?php endif; ?> id="sex-1" name="sex" value="1"class="ui-radio" >
                                    <label for="sex-1" class="ui-radio-label"><?php echo $this->_var['lang']['male']; ?></label>
                                </div>
                                <div class="radio-item">
                                    <input type="radio" <?php if ($this->_var['profile']['sex'] == 2): ?> checked="checked" <?php endif; ?>id="sex-2" name="sex" value="2"class="ui-radio" >
                                    <label for="sex-2" class="ui-radio-label"><?php echo $this->_var['lang']['female']; ?></label>
                                </div>
                                <div class="radio-item">
                                    <input type="radio" <?php if ($this->_var['profile']['sex'] == 0): ?> checked="checked" <?php endif; ?> id="sex-3" name="sex" value="0" class="ui-radio">
                                    <label for="sex-3" class="ui-radio-label"><?php echo $this->_var['lang']['secrecy']; ?></label>
                                </div>
                            </div>
                        </div>
                        <?php if ($this->_var['profile']['email'] != ""): ?>
                        <div class="item">
                            <div class="label"><?php echo $this->_var['lang']['email_user']; ?>：</div>
                            <div class="value">
                                <span class="txt-lh2 fl" id="profile_email"><?php echo $this->_var['profile']['email']; ?></span>
                                <?php if ($this->_var['profile']['is_validate'] == 0): ?>
                                <span class="txt-lh2 ml10"><a href="user.php?act=account_safe&type=change_email" class="ftx-05"><?php echo $this->_var['lang']['Immediately_verify']; ?></a></span>
                                <?php else: ?>
                                <span class="succeed"><i></i></span>
                                <?php endif; ?>
                            </div>
                        </div>
                        <?php endif; ?>
                        <?php if ($this->_var['sms_register']): ?>
                        <div class="item">
                            <div class="label"><?php echo $this->_var['lang']['mobile']; ?>：</div>
                            <div class="value">
                                <?php if ($this->_var['profile']['mobile_phone'] != ""): ?>
                                <span class="txt-lh2"><?php echo $this->_var['profile']['mobile_phone']; ?></span>
                                <?php else: ?>
                                <span class="txt-lh2">
                                    <a id="zphone" class="zphone ftx-05 ml5" <?php if ($this->_var['profile']['mobile_phone'] == ''): ?>href="user.php?act=account_safe&type=change_phone"<?php else: ?>style="cursor:default;"<?php endif; ?>><?php echo $this->_var['lang']['Immediately_verify']; ?></a>
                                </span>
                                <?php endif; ?>
                            </div>
                        </div>
                        <?php endif; ?>
                        
                        <?php $_from = $this->_var['extend_info_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'field');if (count($_from)):
    foreach ($_from AS $this->_var['field']):
?>
                        <?php if ($this->_var['field']['id'] == 6): ?>
                        <div class="item">
                            <div class="label"><?php echo $this->_var['lang']['passwd_question']; ?>：</div>
                            <div class="value">
                                <div class="imitate_select w200">
                                    <div class="cite"><span>请选择</span><i class="iconfont icon-down"></i></div>
                                    <ul>
                                        <li><a href="javascript:void(0);" data-value="0"><?php echo $this->_var['lang']['sel_question']; ?></a></li>
                                        <?php $_from = $this->_var['passwd_questions']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'data_0_66744300_1507431355');if (count($_from)):
    foreach ($_from AS $this->_var['data_0_66744300_1507431355']):
?>
                                        <li><a href="javascript:void(0);" data-value="<?php echo $this->_var['data_0_66744300_1507431355']; ?>"><?php echo $this->_var['data_0_66744300_1507431355']; ?></a></li>
                                        <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
                                    </ul>
                                    <input type="hidden" name="sel_question" value="<?php echo $this->_var['profile']['passwd_question']; ?>"/>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="label" <?php if ($this->_var['field']['is_need']): ?>id="passwd_quesetion"<?php endif; ?>><?php echo $this->_var['lang']['passwd_answer']; ?>：</div>
                            <div class="value">
                                <input name="passwd_answer" type="text" size="25" class="text text-1" maxlengt='20' value="<?php echo $this->_var['profile']['passwd_answer']; ?>"/>
                            </div>
                        </div>
                        <?php else: ?>
                        <?php if ($this->_var['field']['reg_field_name'] != '手机'): ?>
                        <div class="item" style="margin-top:10px;">
                            <div class="label" <?php if ($this->_var['field']['is_need']): ?> id="extend_field<?php echo $this->_var['field']['id']; ?>i"<?php endif; ?> ><?php echo $this->_var['field']['reg_field_name']; ?>：</div>
                            <div class="value">
                                <input name="extend_field<?php echo $this->_var['field']['id']; ?>" id="extend_field<?php echo $this->_var['field']['id']; ?>" type="text" class="text text-1" value="<?php echo $this->_var['field']['content']; ?>"/>
                            </div>
                        </div>
                        <?php endif; ?>
                        <?php endif; ?>
                        <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
                        <div class="item item-button">
                            <div class="label">&nbsp;</div>
                            <div class="value">
                                <input type="hidden" name="seccode" id="seccode" value="<?php echo $this->_var['sms_security_code']; ?>" />
                                <input id="flag" type="hidden" value="register" />
                                <input name="act" type="hidden" value="act_edit_profile" />
                                <a href="javascript:void(0);" class="sc-btn sc-redBg-btn" ectype="submit"><?php echo $this->_var['lang']['confirm_edit']; ?></a>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="avatar_change" ectype="upImgTouch">
                    <img class="am-circle" src="" width="120" height="120">
                    <a href="javascript:void(0);" class="changeavatar"><div class="shadeDiv"></div><span><?php echo $this->_var['lang']['Modify_Avatar']; ?></span></a>
                </div>
            </div>
        </div>
        
        
        <div class="am-modal" ectype="docMdal">
            <div class="am-modal-dialog">
                <div class="am-modal-hd">
                    <label>修改头像</label>
                    <a href="javascript: void(0)" class="am-close am-close-spin" data-am-modal-close>&times;</a>
                </div>
                <div class="am-modal-bd">
                    <div class="am-g am-fl">
                        <div class="am-form-group am-form-file">
                            <div class="am-fl">
                                <button type="button" class="am-btn am-btn-default"><i class="iconfont icon-cloud-upload-alt"></i> 选择要上传的文件</button>
                            </div>
                            <input type="file" ectype="fileImage" id="inputImage">
                        </div>
                    </div>
                    <div class="am-g am-fl" >
                        <div class="up-pre-before" ectype="up-pre-before"><img alt="" src="" id="image" ectype="image"></div>
                        <div class="up-pre-after"></div>
                    </div>
                    <div class="am-g am-fl">
                        <div class="up-control-btns">
                            <span class="iconfont icon-rotate-left" ectype="rotate" data-type="left"></span>
                            <span class="iconfont icon-rotate-right" ectype="rotate" data-type="right"></span>
                            <span class="iconfont icon-gou" ectype="upBtnOk" id="up-btn-ok" url="ajax_user.php?act=upload_user_picture"></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        
        <div class="am-modal am-modal-alert" ectype="modalAlert">
            <div class="am-modal-dialog">
                <div class="am-modal-bd" ectype="alertContent"></div>
                <div class="am-modal-footer"><span class="am-modal-btn">确定</span></div>
            </div>
        </div>
        <?php endif; ?>
        
        
        
        <?php if ($this->_var['action'] == 'account_safe'): ?>
        <div class="user-mod">
            <?php if ($this->_var['type'] == 'default'): ?>
            <div class="user-title">
                <h2>账户安全</h2>
                <div class="user-safe-level level-<?php echo $this->_var['security_rating']['count']; ?>">
                    <div class="level-word"><?php echo $this->_var['security_rating']['count_info']; ?></div>
                    <div class="level-progress"></div>
                    <div class="level-tip" id="promptInfo"><?php echo $this->_var['lang']['Security_level_desc']; ?></div>
                </div>
            </div>
            <div class="user-safe-list">
                <div class="item">
                    <div class="item-icon"><i class="iconfont icon-password-alt"></i></div>
                    <div class="item-info">
                        <div class="info-name"><?php echo $this->_var['lang']['password_user']; ?></div>
                        <p><span class="ftx-01"><?php echo $this->_var['lang']['password_user_desc']; ?></span></p>
                    </div>
                    <div class="item-handle"><a href="user.php?act=account_safe&type=change_password" class="handle-btn"><?php echo $this->_var['lang']['modify']; ?></a></div>
                </div>
                <div class="item">
                    <div class="item-icon"><i class="iconfont icon-email"></i></div>
                    <?php if ($this->_var['validate']['email_validate']): ?>
                    <div class="item-info">
                        <div class="info-name"><?php echo $this->_var['lang']['email_yanzheng']; ?></div>
                        <p>
                            <span class="ftx-03"><?php echo $this->_var['lang']['email_yanzheng_you']; ?>：</span>
                            <strong class="ftx-06" id="email"><?php echo $this->_var['validate']['email']; ?></strong>
                        </p>
                    </div>
                    <div class="item-handle"><a href="user.php?act=account_safe&type=change_email" class="handle-btn"><?php echo $this->_var['lang']['modify']; ?></a></div>
                    <?php else: ?>
                    <div class="item-info">
                        <div class="info-name"><?php echo $this->_var['lang']['email_yanzheng']; ?></div>
                        <p><?php echo $this->_var['lang']['Email_authent_desc']; ?></p>
                    </div>
                    <div class="item-handle"><a href="user.php?act=account_safe&type=change_email" class="handle-btn handle-btn-red">立即<?php echo $this->_var['lang']['is_validated']; ?></a></div>
                    <?php endif; ?>
                </div>
                <div class="item">
                    <div class="item-icon"><i class="iconfont icon-mobile-phone"></i></div>
                    <?php if ($this->_var['validate']['mobile_phone']): ?>
                        <div class="item-info">
                            <div class="info-name"><?php echo $this->_var['lang']['phone_yanzheng']; ?></div>
                            <p><?php echo $this->_var['lang']['phone_authent_desc']; ?></p>
                        </div>
                        <div class="item-handle"><a href="user.php?act=account_safe&type=change_phone" class="handle-btn"><?php echo $this->_var['lang']['modify']; ?></a></div>
                    <?php else: ?>
                        <div class="item-info">
                            <div class="info-name"><?php echo $this->_var['lang']['phone_yanzheng']; ?></div>
                            <p><?php echo $this->_var['lang']['phone_authent_desc_one']; ?></p>
                        </div>
                        <div class="item-handle"><a href="user.php?act=account_safe&type=change_phone" class="handle-btn handle-btn-red"><?php echo $this->_var['lang']['Immediately_verify']; ?></a></div>
                    <?php endif; ?>
                </div>
                <div class="item">
                    <div class="item-icon"><i class="iconfont icon-password-alt"></i></div>
                    <?php if ($this->_var['validate']['paypwd_id']): ?>
                    <div class="item-info">
                        <div class="info-name"><?php echo $this->_var['lang']['pay_password']; ?></div>
                        <p>
                        <span><?php echo $this->_var['lang']['Degree_of_safety']; ?>：</span>
                            <i id="cla" class="safe-rank04"></i>
                            <span class="ftx-03"><?php echo $this->_var['lang']['Degree_of_safety_desc']; ?></span>
                        </p>
                    </div>
                    <div class="item-handle"><a href="user.php?act=account_safe&type=payment_password&step=zero" class="handle-btn"><?php echo $this->_var['lang']['pay_password_manage']; ?></a></div>
                    <?php else: ?>
                    <div class="item-info">
                        <div class="info-name"><?php echo $this->_var['lang']['pay_password']; ?></div>
                        <p><?php echo $this->_var['lang']['Safety_renzheng_desc']; ?></p>
                    </div>
                    <div class="item-handle"><a href="user.php?act=account_safe&type=payment_password" class="handle-btn handle-btn-red"><?php echo $this->_var['lang']['Enable_now']; ?></a></div>
                    <?php endif; ?>
                </div>
                <div class="item">
                    <div class="item-icon"><i class="iconfont icon-identity"></i></div>
                    <?php if ($this->_var['validate']['real_id']): ?>
                    <div class="item-info">
                        <div class="info-name"><?php echo $this->_var['lang']['16_users_real']; ?></div>
                        <p>
                            <span class="ftx-03"><?php echo $this->_var['lang']['16_users_real_info']; ?>：</span>
                            <strong class="ftx-06"><?php echo $this->_var['validate']['real_name']; ?></strong>
                            <strong class="ftx-06"><?php echo $this->_var['validate']['bank_card']; ?></strong>
                        </p>
                    </div>
                    <div class="item-handle"><a href="user.php?act=account_safe&type=real_name" class="handle-btn"><?php echo $this->_var['lang']['view']; ?></a></div>
                    <?php else: ?>
                    <div class="item-info">
                        <div class="info-name"><?php echo $this->_var['lang']['16_users_real']; ?></div>
                        <p><?php echo $this->_var['lang']['16_users_real_desc']; ?></p>
                    </div>
                    <div class="item-handle"><a href="user.php?act=account_safe&type=real_name" class="handle-btn handle-btn-red"><?php echo $this->_var['lang']['Safety_now']; ?></a></div>
                    <?php endif; ?>
                </div>
            </div>
            <?php endif; ?>
            
            <?php if ($this->_var['type'] == 'change_password'): ?>
            <div class="type">
                <div class="user-title">
                    <h2><?php echo $this->_var['lang']['edit_password_login']; ?></h2>
                </div>
                
                <div class="stepflex">
                    <dl class="first <?php if ($this->_var['step'] == 'first'): ?>doing<?php elseif ($this->_var['step'] == 'second' || $this->_var['step'] == 'last'): ?>done<?php endif; ?>">
                        <dt class="s-num">1</dt>
                        <dd class="s-text"><?php echo $this->_var['lang']['Verify_identity']; ?><s></s><b></b></dd>
                        <dd></dd>
                    </dl>
                    <dl class="normal <?php if ($this->_var['step'] == 'second'): ?>doing<?php elseif ($this->_var['step'] == 'last'): ?>done<?php endif; ?>">
                        <dt class="s-num">2</dt>
                        <dd class="s-text"><?php echo $this->_var['lang']['edit_password_login']; ?><s></s><b></b></dd>
                    </dl>
                    <dl class="last <?php if ($this->_var['step'] == 'last'): ?>doing<?php endif; ?>">
                        <?php if ($this->_var['step'] == 'last'): ?>
                        <dt class="s-num">3</dt>
                        <?php else: ?>
                        <dt class="s-num">&nbsp;</dt>
                        <?php endif; ?>
                        <dd class="s-text"><?php echo $this->_var['lang']['complete']; ?><s></s><b></b></dd>
                    </dl>
                </div>
                <?php if ($this->_var['step'] == 'first'): ?>
                <div class="security-warp">
                    <?php if ($this->_var['sign'] == 'mobile'): ?>
                    <form name="formUser" method="post" action="user.php" onSubmit="return submitSurplus(this)" class="user-form user-form-safe">
                        <div class="form-row">
                            <div class="form-label"><?php echo $this->_var['lang']['Verify_phone_in']; ?>：</div>
                            <div class="form-value">
                                <?php echo $this->_var['user_info']['mobile_phone']; ?>
                                <input id="mobile_phone" type="hidden" value="<?php echo $this->_var['user_info']['mobile_phone']; ?>" />
                                <?php if ($this->_var['validate_info']['is_validated'] && $this->_var['validate_info']['email']): ?>
                                <b><a href="user.php?act=account_safe&type=change_password&sign=email" class="ftx-14"><?php echo $this->_var['lang']['Verify_email_in']; ?></a></b>
                                <?php endif; ?>
                                <?php if ($this->_var['validate_info']['pay_password']): ?>
                                <b><a href="user.php?act=account_safe&type=change_password&sign=paypwd" class="ftx-14"><?php echo $this->_var['lang']['Verify_password_in']; ?></a></b>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-label"><?php echo $this->_var['lang']['bindMobile_code']; ?>：</div>
                            <div class="form-value">
                                <input class="itxt" name="mobile_phone" id="mobile_phone" value="<?php echo $this->_var['user_info']['mobile_phone']; ?>" type="hidden">
                                <input name="sms_value" id="sms_value" type="hidden" value="sms_code" class="text text-2" />
                                <input class="form-input" type="text" name="mobile_code" tabindex="1" id="mobile_code" disabled="disabled">
                                <a href="javascript:sendSms()" id="zphone" class="sms-btn"><?php echo $this->_var['lang']['getMobile_code']; ?></a>
                                <label class="error" id="phone_captcha"><i></i></label>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-label"><?php echo $this->_var['lang']['comment_captcha']; ?>：</div>
                            <div class="form-value">
                                <input class="form-input authCode txt-4" name="authCode" id="authCode" type="text" value="">
                                <img src="captcha_verify.php?captcha=change_password_f&<?php echo $this->_var['rand']; ?>" alt="captcha" id="captcha_img" class="fl mr10" onClick="this.src='captcha_verify.php?captcha=change_password_f&'+Math.random()" width="100" height="40" />
                                <label class="error" id="code_notice"></label>
                            </div>
                        </div>
                        <div class="form-btn-wp">
                            <input id="flag" type="hidden" value="change_password_f" name="flag">
                            <input id="seccode" type="hidden" value="<?php echo $this->_var['sms_security_code']; ?>" name="seccode">
                            <input type="hidden" value="account_safe" name="act">
                            <input type="hidden" value="change_password" name="type">
                            <input type="hidden" value="second" name="step">
                            
                            <input type="submit" class="form-btn form-btn-line" value="<?php echo $this->_var['lang']['button_submit']; ?>">
                        </div>
                    </form>
                    <?php elseif ($this->_var['sign'] == 'email'): ?>
                    <form name="change_email_s" method="post" action="user.php" onSubmit="return submitSurplus(this)" class="user-form user-form-safe">
                        <div class="form-row">
                            <div class="form-label"><?php echo $this->_var['lang']['Verified_mailbox']; ?>：</div>
                            <div class="form-value">
                                <?php echo $this->_var['user_info']['email']; ?>
                                <input id="change_email" type="hidden" value="<?php echo $this->_var['user_info']['email']; ?>" />
                                <input id="mobile_phone" type="hidden" value="<?php echo $this->_var['user_info']['mobile_phone']; ?>" />
                                <?php if ($this->_var['validate_info']['mobile_phone']): ?>
                                <b><a href="user.php?act=account_safe&type=change_password&sign=mobile" class="ftx-14"><?php echo $this->_var['lang']['Verify_phone_user']; ?></a></b>
                                <?php endif; ?>
                                <?php if ($this->_var['validate_info']['pay_password']): ?>
                                <b><a href="user.php?act=account_safe&type=change_password&sign=paypwd" class="ftx-14"><?php echo $this->_var['lang']['Verify_password_in']; ?></a></b>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-label"><?php echo $this->_var['lang']['comment_captcha']; ?>：</div>
                            <div class="form-value">
                                <input class="form-input authCode txt-4" name="authCode" id="authCode" type="text" value="">
                                <img src="captcha_verify.php?captcha=change_password_f&<?php echo $this->_var['rand']; ?>" alt="captcha" id="captcha_img" class="fl mr10" onClick="this.src='captcha_verify.php?captcha=change_password_f&'+Math.random()" width="100" height="40" />
                                <label class="error" id="code_notice"></label>
                            </div>
                        </div>
                        
                        <div class="form-btn-wp">
                            <a id="sendMail" href="javascript:;" onclick="sendChangeEmail('change_pwd');" class="form-btn form-btn-line"><?php echo $this->_var['lang']['send_verify_email']; ?></a>
                        </div>
                    </form>
                    <?php elseif ($this->_var['sign'] == 'paypwd'): ?>
                    <form name="formUser" method="post" action="user.php" onSubmit="return submitSurplus(this)" class="user-form user-form-safe">
                        <div class="form-row">
                            <div class="form-label"><?php echo $this->_var['lang']['input_pay_password']; ?>：</div>
                            <div class="form-value">
                                <input type="password"   style="display:none"/>
                                <input class="form-input" type="password" name="pay_password" tabindex="1" id="pay_password">
                                <?php if ($this->_var['validate_info']['is_validated'] && $this->_var['validate_info']['email']): ?>
                                <b><a href="user.php?act=account_safe&type=change_password&sign=email" class="ftx-14"><?php echo $this->_var['lang']['Verify_email_in']; ?></a></b>
                                <?php endif; ?>
                                <?php if ($this->_var['validate_info']['pay_password']): ?>
                                <b><a href="user.php?act=account_safe&type=change_password&sign=mobile" class="ftx-14"><?php echo $this->_var['lang']['Verify_phone_user']; ?></a></b>
                                <?php endif; ?>
                                <label class="error" id="pay_password_notice"><i></i></label>
                            </div>
                        </div>
                        <?php if ($this->_var['enabled_sms_signin']): ?>
                        <div class="form-row">
                            <div class="form-label"><?php echo $this->_var['lang']['comment_captcha']; ?>：</div>
                            <div class="form-value">
                                <input class="form-input authCode txt-4" name="authCode" id="authCode" type="text" value="">
                                <img src="captcha_verify.php?captcha=change_password_f&<?php echo $this->_var['rand']; ?>" alt="captcha" id="captcha_img" class="fl mr10" onClick="this.src='captcha_verify.php?captcha=change_password_f&'+Math.random()" width="100" height="40" />
                                <label class="error" id="code_notice"><i></i></label>
                            </div>
                        </div>
                        <?php endif; ?>
                        <div class="form-btn-wp">
                            <input id="flag" type="hidden" value="change_password_f" name="flag">
                            <input id="seccode" type="hidden" value="<?php echo $this->_var['sms_security_code']; ?>" name="seccode">
                            <input type="hidden" value="paypwd" name="sign">

                            <input type="hidden" value="account_safe" name="act">
                            <input type="hidden" value="change_password" name="type">
                            <input type="hidden" value="second" name="step">

                            <input type="submit" id="submitCode" class="form-btn form-btn-line" value="<?php echo $this->_var['lang']['submit_goods']; ?>">
                        </div>
                    </form>
                    <?php endif; ?>
                </div>
                <?php if ($this->_var['sign'] == 'validate_mail_ok'): ?>
                <div class="user-pwd-prompt user-prompt-ok">
                    <div class="fore">
                        <h3><span class="ftx-02"><?php echo $this->_var['lang']['send_email_in']; ?>：</span><?php echo $this->_var['user_info']['email']; ?>&nbsp;&nbsp;</h3>
                        <div class="ftx-03"><?php echo $this->_var['lang']['send_email_desc_one']; ?></div>
                        <div class="tc mt20"><a class="sc-btn btn35" href="javascript:history.back();"><?php echo $this->_var['lang']['send_email_desc_two']; ?></a></div>
                    </div>
                </div>
                <?php endif; ?>
                <?php elseif ($this->_var['step'] == 'second'): ?>
                <div class="form pl180">
                    <form  class="user-form user-form-safe" action="user.php" name="change_password_s" method="POST" onSubmit="return submitSurplus(this)">
                        <div class="form-row">
                            <div class="form-label w150 tr"><?php echo $this->_var['lang']['new_login_password']; ?>：</div>
                            <div class="form-value"><input type="password"   style="display:none"/><input type="password"  name="new_password" id="password" class="form-input"><label class="error" id="new_password_error"><i></i></label></div>
                        </div>
                        <div class="form-row">
                            <div class="form-label w150 tr"><?php echo $this->_var['lang']['input_password_again']; ?>：</div>
                            <div class="form-value"><input type="password"   style="display:none"/><input class="form-input" type="password" name="re_new_password" id="re_new_password"></div>
                            <div id="rePassword_error" class="msg-error" style="display:none"></div>
                        </div>

                        <div class="form-row">
                            <div class="form-label w150 tr"><?php echo $this->_var['lang']['comment_captcha']; ?>：</div>
                            <div class="form-value">
                                <input class="form-input authCode txt-4" name="authCode" id="authCode" type="text" value="">
                                <img src="captcha_verify.php?captcha=change_password_f&<?php echo $this->_var['rand']; ?>" alt="captcha" id="captcha_img" class="fl mr10" onClick="this.src='captcha_verify.php?captcha=change_password_f&'+Math.random()" width="100" height="40" />
                                <label class="error" id="code_notice"><i></i></label>
                            </div>
                        </div>

                        <div class="form-btn-wp" style=" margin:30px 0 20px 169px;">
                            <input type="hidden" name="act" value="account_safe" />
                            <input type="hidden" name="type" value="change_password" />
                            <input type="hidden" name="step" value="last" />

                            <input type="submit" class="form-btn form-btn-line" value="<?php echo $this->_var['lang']['button_submit']; ?>">
                        </div>
                    </form>
                </div>
                <?php elseif ($this->_var['step'] == 'last'): ?>
                <div class="user-pwd-prompt user-prompt-ok">
                    <s class="icon-succ02 m-icon"></s>
                    <div class="fore">
                        <h3><?php echo $this->_var['lang']['security_rating']; ?></h3>
                        <div class="u-safe"><?php echo $this->_var['lang']['security_rating_one']; ?>：<i class="safe-rank0<?php echo $this->_var['security_rating']['count']; ?>" id="cla"></i><strong class="rank-text ftx-04"><?php echo $this->_var['security_rating']['count_info']; ?></strong></div>
                        <div class="ftx-03"><?php echo $this->_var['lang']['security_rating_two']; ?><a href="user.php?act=account_safe" class="ftx-05"><?php echo $this->_var['lang']['Security_Center']; ?></a><?php echo $this->_var['lang']['security_rating_three']; ?></div>
                    </div>
                </div>
                <?php endif; ?>
            </div>
            
            <?php elseif ($this->_var['type'] == 'change_email'): ?>
            <div class="type">
                <div class="user-title">
                    <h2><?php echo $this->_var['lang']['Mailbox_Management']; ?></h2>
                </div>
                
                <div class="stepflex">
                    <dl class="first <?php if ($this->_var['step'] == 'first'): ?>doing<?php elseif ($this->_var['step'] == 'second' || $this->_var['step'] == 'last' || $this->_var['step'] == 'second_email_verify'): ?>done<?php endif; ?>">
                        <dt class="s-num">1</dt>
                        <dd class="s-text"><?php echo $this->_var['lang']['Verify_identity']; ?><s></s><b></b></dd>
                        <dd></dd>
                    </dl>
                    <dl class="normal <?php if ($this->_var['step'] == 'second' || $this->_var['step'] == 'second_email_verify'): ?>doing<?php elseif ($this->_var['step'] == 'last'): ?>done<?php endif; ?>">
                        <dt class="s-num">2</dt>
                        <?php if ($this->_var['validate_info']['is_validated']): ?>
                        <dd class="s-text"><?php echo $this->_var['lang']['edit_email']; ?><s></s><b></b></dd>
                        <?php else: ?>
                        <dd class="s-text"><?php echo $this->_var['lang']['Verify_mailbox']; ?><s></s><b></b></dd>
                        <?php endif; ?>
                    </dl>
                    <dl class="last <?php if ($this->_var['step'] == 'last'): ?>doing<?php endif; ?>">
                       <?php if ($this->_var['step'] == 'last'): ?>
                        <dt class="s-num">3</dt>
                        <?php else: ?>
                        <dt class="s-num">&nbsp;</dt>
                        <?php endif; ?>
                        <dd class="s-text"><?php echo $this->_var['lang']['complete']; ?><s></s><b></b></dd>
                    </dl>
                </div>

                <?php if ($this->_var['step'] == 'first'): ?>
                <div class="form">
                    <div class="security-warp">
                        <?php if ($this->_var['sign'] == 'mobile'): ?>
                        <form name="formUser" method="post" action="user.php" onSubmit="return submitSurplus(this)" class="user-form user-form-safe">
                            <div class="form-row">
                                <div class="form-label"><?php echo $this->_var['lang']['Verify_phone_in']; ?>：</div>
                                <div class="form-value">
                                    <?php echo $this->_var['user_info']['mobile_phone']; ?>
                                    <input id="mobile_phone" type="hidden" value="<?php echo $this->_var['user_info']['mobile_phone']; ?>" />
                                    <?php if ($this->_var['validate_info']['is_validated'] && $this->_var['validate_info']['email']): ?>
                                    <b><a href="user.php?act=account_safe&type=change_email&sign=email" class="ftx-14"><?php echo $this->_var['lang']['Verify_email_in']; ?></a></b>
                                    <?php endif; ?>
                                    <?php if ($this->_var['validate_info']['pay_password']): ?>
                                    <b><a href="user.php?act=account_safe&type=change_email&sign=paypwd" class="ftx-14"><?php echo $this->_var['lang']['Verify_password_in']; ?></a></b>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-label"><?php echo $this->_var['lang']['bindMobile_code']; ?>：</div>
                                <div class="form-value">
                                    <input class="itxt" name="mobile_phone" id="mobile_phone" value="<?php echo $this->_var['user_info']['mobile_phone']; ?>" type="hidden">
                                    <input name="sms_value" id="sms_value" type="hidden" value="sms_code" class="text text-2" />
                                    <input class="form-input" type="text" name="mobile_code" tabindex="1" id="mobile_code" disabled="disabled"><a href="javascript:sendSms()" id="zphone" class="sms-btn"><?php echo $this->_var['lang']['getMobile_code']; ?></a>
                                    <div class="error" id="phone_captcha"></div>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-label"><?php echo $this->_var['lang']['comment_captcha']; ?>：</div>
                                <div class="form-value">
                                    <input class="form-input authCode txt-4" name="authCode" id="authCode" type="text" value="">
                                    <img src="captcha_verify.php?captcha=change_password_f&<?php echo $this->_var['rand']; ?>" alt="captcha" id="captcha_img" class="fl mr10" onClick="this.src='captcha_verify.php?captcha=change_password_f&'+Math.random()" width="100" height="40" />
                                    <div class="error" id="code_notice"></div>
                                </div>
                            </div>
                            
                            <div class="form-btn-wp">
                                <input id="flag" type="hidden" value="change_password_f" name="flag">
                                <input id="seccode" type="hidden" value="<?php echo $this->_var['sms_security_code']; ?>" name="seccode">
                                <input type="hidden" value="mobile" name="sign">

                                <input type="hidden" value="account_safe" name="act">
                                <input type="hidden" value="change_email" name="type">
                                <input type="hidden" value="second" name="step">

                                <input type="submit" class="form-btn form-btn-line" value="<?php echo $this->_var['lang']['button_submit']; ?>">
                            </div>
                        </form>
                        <?php elseif ($this->_var['sign'] == 'email'): ?>
                        <form name="change_email_s" method="post" action="user.php" onSubmit="return submitSurplus(this)" class="user-form user-form-safe">
                            <div class="form-row">
                                <div class="form-label"><?php echo $this->_var['lang']['Verified_mailbox']; ?>：</div>
                                <div class="form-value">
                                    <?php echo $this->_var['user_info']['email']; ?>
                                    <input id="change_email" type="hidden" value="<?php echo $this->_var['user_info']['email']; ?>" />
                                    <input id="mobile_phone" type="hidden" value="<?php echo $this->_var['user_info']['mobile_phone']; ?>" />
                                    <?php if ($this->_var['validate_info']['mobile_phone']): ?>
                                    <b><a href="user.php?act=account_safe&type=change_email&sign=mobile" class="ftx-14"><?php echo $this->_var['lang']['Verify_phone_user']; ?></a></b>
                                    <?php endif; ?>
                                    <?php if ($this->_var['validate_info']['pay_password']): ?>
                                    <b><a href="user.php?act=account_safe&type=change_email&sign=paypwd" class="ftx-14"><?php echo $this->_var['lang']['Verify_password_in']; ?></a></b>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-label"><?php echo $this->_var['lang']['comment_captcha']; ?>：</div>
                                <div class="form-value">
                                    <input class="form-input authCode txt-4" name="authCode" id="authCode" type="text" value="">
                                    <img src="captcha_verify.php?captcha=change_password_f&<?php echo $this->_var['rand']; ?>" alt="captcha" id="captcha_img" class="fl mr10" onClick="this.src='captcha_verify.php?captcha=change_password_f&'+Math.random()" width="100" height="40" />
                                    <div class="error" id="code_notice"></div>
                                </div>
                            </div>
                            
                            <div class="form-btn-wp">
                                <?php if ($this->_var['is_validated']): ?>
                                    <a id="sendMail" href="javascript:;" onclick="sendChangeEmail('change_mail');" class="form-btn form-btn-line"><?php echo $this->_var['lang']['send_verify_email']; ?></a>
                                <?php else: ?>
                                    <input name="is_validated" value="<?php echo empty($this->_var['is_validated']) ? '0' : $this->_var['is_validated']; ?>" type="hidden">
                                    <a id="sendMail" href="javascript:;" onclick="sendChangeEmail('edit_mail');" class="form-btn form-btn-line"><?php echo $this->_var['lang']['send_verify_email']; ?></a>
                                <?php endif; ?>
                            </div>
                        </form>
                        <?php elseif ($this->_var['sign'] == 'paypwd'): ?>
                        <form name="formUser" method="post" action="user.php" onSubmit="return submitSurplus(this)" class="user-form user-form-safe">
                            <div class="form-row">
                                <div class="form-label"><?php echo $this->_var['lang']['input_pay_password']; ?>：</div>
                                <div class="form-value">
                                    <input type="password"   style="display:none"/>
                                    <input class="form-input" type="password" name="pay_password" tabindex="1" id="pay_password">
                                    <?php if ($this->_var['validate_info']['is_validated'] && $this->_var['validate_info']['email']): ?>
                                    <b><a href="user.php?act=account_safe&type=change_email&sign=email" class="ftx-14"><?php echo $this->_var['lang']['Verify_email_in']; ?></a></b>
                                    <?php endif; ?>
                                    <?php if ($this->_var['validate_info']['pay_password']): ?>
                                    <b><a href="user.php?act=account_safe&type=change_email&sign=mobile" class="ftx-14"><?php echo $this->_var['lang']['Verify_phone_user']; ?></a></b>
                                    <?php endif; ?>
                                    <div class="error" id="pay_password_notice"></div>
                                </div>
                            </div>
                            
                            <div class="form-row">
                                <div class="form-label"><?php echo $this->_var['lang']['comment_captcha']; ?>：</div>
                                <div class="form-value">
                                    <input class="form-input authCode txt-4" name="authCode" id="authCode" type="text" value="">
                                    <img src="captcha_verify.php?captcha=change_password_f&<?php echo $this->_var['rand']; ?>" alt="captcha" id="captcha_img" class="fl mr10" onClick="this.src='captcha_verify.php?captcha=change_password_f&'+Math.random()" width="100" height="40" />
                                    <div class="error" id="code_notice"><i></i></div>
                                </div>
                            </div>

                            <div class="form-btn-wp">
                                <input id="flag" type="hidden" value="change_password_f" name="flag">
                                <input id="seccode" type="hidden" value="<?php echo $this->_var['sms_security_code']; ?>" name="seccode">
                                <input type="hidden" value="paypwd" name="sign">

                                <input type="hidden" value="account_safe" name="act">
                                <input type="hidden" value="change_email" name="type">
                                <input type="hidden" value="second" name="step">

                                <input type="submit" id="submitCode" class="form-btn form-btn-line" value="<?php echo $this->_var['lang']['submit_goods']; ?>">
                            </div>
                        </form>
                        <?php endif; ?>
                    </div>
                    <?php if ($this->_var['sign'] == 'validate_mail_ok'): ?>
                    <div class="user-pwd-prompt user-prompt-ok">
                        <s class="icon-succ02 m-icon"></s>
                        <div class="fore">
                            <h3><span class="ftx-02"><?php echo $this->_var['lang']['send_email_in']; ?>：</span><?php echo $this->_var['user_info']['email']; ?>&nbsp;&nbsp;</h3>
                            <div class="ftx-03"><?php echo $this->_var['lang']['send_email_desc_one']; ?></div>
                            <a class="sc-btn btn35 mt30" href="javascript:history.back();"><?php echo $this->_var['lang']['send_email_desc_two']; ?></a>
                        </div>
                    </div>
                    <?php endif; ?>
                </div>
                <?php elseif ($this->_var['step'] == 'second'): ?>
                <div class="form">
                    <?php if ($this->_var['sign'] == 'edit_email_ok'): ?>
                    <div class="user-pwd-prompt user-prompt-ok">
                        <s class="icon-succ02 m-icon"></s>
                        <div class="fore">
                            <h3><?php echo $this->_var['lang']['send_email_in']; ?>：<span class="txt"><?php echo $this->_var['validate_new_mail']; ?>&nbsp;&nbsp;</span></h3>
                            <div class="ftx-01"><?php echo $this->_var['lang']['send_email_desc_three']; ?></div>
                            <div class="ftx-03"><?php echo $this->_var['lang']['send_email_desc_one']; ?></div>
                            <a class="sc-btn btn35 mt30" href="javascript:history.back();"><?php echo $this->_var['lang']['send_email_desc_two']; ?></a>
                        </div>
                    </div>
                    <?php else: ?>
                    <div class="security-warp">
                        <form class="user-form user-form-safe" action="user.php" name="change_email_s" method="POST" onSubmit="return submitSurplus(this)">
                            <div class="form-row">
                                <div class="form-label"><?php echo $this->_var['lang']['website_email']; ?>：</div>
                                <div class="form-value"><input class="form-input" type="text" name="change_email" id="change_email" value="<?php echo $this->_var['user_email']; ?>"></div>
                                <div id="change_email_notice" class="msg-error"></div>
                            </div>

                            <div class="form-row">
                                <div class="form-label"><?php echo $this->_var['lang']['comment_captcha']; ?>：</div>
                                <div class="form-value">
                                    <input class="form-input authCode txt-4" name="authCode" id="authCode" type="text" value="">
                                    <img src="captcha_verify.php?captcha=change_password_f&<?php echo $this->_var['rand']; ?>" alt="captcha" id="captcha_img" class="fl mr10" onClick="this.src='captcha_verify.php?captcha=change_password_f&'+Math.random()" width="100" height="40" />
                                    <div class="error" id="code_notice"></div>
                                </div>
                            </div>

                            <div class="form-btn-wp">
                                <a id="sendMail" href="javascript:;" onclick="sendChangeEmail('edit_mail');" class="form-btn form-btn-line"><?php echo $this->_var['lang']['send_verify_email']; ?></a>
                            </div>
                        </form>
                    </div>
                    <?php endif; ?>
                </div>
                <?php elseif ($this->_var['step'] == 'last'): ?>
                <div class="user-pwd-prompt user-prompt-ok">
                    <s class="icon-succ02 m-icon"></s>
                    <div class="fore">
                        <?php if ($this->_var['sign'] == 'editmail_ok'): ?>
                        <?php if ($this->_var['validated'] == 1): ?>
                        <h3 class="ftx-02"><?php echo $this->_var['lang']['edit_email_desc_two']; ?></h3>
                        <?php else: ?>
                        <h3 class="ftx-02"><?php echo $this->_var['lang']['edit_email_desc_one']; ?></h3>
                        <?php endif; ?>
                        <?php else: ?>
                        <h3 class="ftx-02"><?php echo $this->_var['lang']['edit_email_desc_two']; ?></h3>
                        <?php endif; ?>
                        <div class="u-safe"><?php echo $this->_var['lang']['security_rating_one']; ?>：<i class="safe-rank0<?php echo $this->_var['security_rating']['count']; ?>" id="cla"></i><strong class="rank-text ftx-04"><?php echo $this->_var['security_rating']['count_info']; ?></strong></div>
                        <div class="ftx-03"><?php echo $this->_var['lang']['security_rating_two']; ?><a href="user.php?act=account_safe" class="ftx-05"><?php echo $this->_var['lang']['Security_Center']; ?></a><?php echo $this->_var['lang']['security_rating_three']; ?></div>
                    </div>
                </div>
                <?php endif; ?>
            </div>
            
            <?php elseif ($this->_var['type'] == 'change_phone'): ?>
            <div class="type">
                <div class="user-title">
                    <h2><?php echo $this->_var['lang']['phone_Management']; ?></h2>
                </div>
                
                <div class="stepflex">
                    <dl class="first <?php if ($this->_var['step'] == 'first'): ?>doing<?php elseif ($this->_var['step'] == 'second' || $this->_var['step'] == 'last'): ?>done<?php endif; ?>">
                        <dt class="s-num">1</dt>
                        <dd class="s-text"><?php echo $this->_var['lang']['Verify_identity']; ?><s></s><b></b></dd>
                        <dd></dd>
                    </dl>
                    <dl class="normal <?php if ($this->_var['step'] == 'second'): ?>doing<?php elseif ($this->_var['step'] == 'last'): ?>done<?php endif; ?>">
                        <dt class="s-num">2</dt>
                        <?php if ($this->_var['validate_info']['mobile_phone']): ?>
                        <dd class="s-text"><?php echo $this->_var['lang']['phone_edit']; ?><s></s><b></b></dd>
                        <?php else: ?>
                        <dd class="s-text"><?php echo $this->_var['lang']['Verify_phone']; ?><s></s><b></b></dd>
                        <?php endif; ?>
                    </dl>
                    <dl class="last <?php if ($this->_var['step'] == 'last'): ?>doing<?php endif; ?>">
                        <?php if ($this->_var['step'] == 'last'): ?>
                        <dt class="s-num">3</dt>
                        <?php else: ?>
                        <dt class="s-num">&nbsp;</dt>
                        <?php endif; ?>
                        
                        <dd class="s-text"><?php echo $this->_var['lang']['complete']; ?><s></s><b></b></dd>
                    </dl>
                </div>
                
                <?php if ($this->_var['step'] == 'first'): ?>
                <div class="form">
                    <div class="security-warp">
                        <?php if ($this->_var['sign'] == 'mobile'): ?>
                        <form name="formUser" method="post" action="user.php" onSubmit="return submitSurplus(this)" class="user-form user-form-safe">
                            <div class="form-row">
                                <div class="form-label"><?php echo $this->_var['lang']['Verify_phone_in']; ?>：</div>
                                <div class="form-value">
                                    <?php echo $this->_var['user_info']['mobile_phone']; ?>
                                    <?php if ($this->_var['validate_info']['mobile_phone']): ?>
                                    <input id="mobile_phone" name="mobile_phone"  type="hidden" value="<?php echo $this->_var['user_info']['mobile_phone']; ?>" />
                                    <?php else: ?>
                                    <input class="form-input" id="mobile_phone" name="mobile_phone" type="text" value="<?php echo $this->_var['user_info']['mobile_phone']; ?>" />
                                    <?php endif; ?>
                                    <?php if ($this->_var['validate_info']['is_validated'] && $this->_var['validate_info']['email']): ?>
                                    <b><a href="user.php?act=account_safe&type=change_phone&sign=email" class="ftx-14"><?php echo $this->_var['lang']['Verify_email_in']; ?></a></b>
                                    <?php endif; ?>
                                    <?php if ($this->_var['validate_info']['pay_password']): ?>
                                    <b><a href="user.php?act=account_safe&type=change_phone&sign=paypwd" class="ftx-14"><?php echo $this->_var['lang']['Verify_password_in']; ?></a></b>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-label"><?php echo $this->_var['lang']['bindMobile_code']; ?>：</div>
                                <div class="form-value">
                                    <?php if ($this->_var['validate_info']['mobile_phone']): ?>
                                    <input class="itxt" name="mobile_phone" id="mobile_phone" value="<?php echo $this->_var['user_info']['mobile_phone']; ?>" type="hidden">
                                    <?php endif; ?>
                                    <input name="sms_value" id="sms_value" type="hidden" value="sms_code" class="text text-2" />
                                    <input class="form-input" type="text" name="mobile_code" tabindex="1" id="mobile_code" disabled="disabled"><a href="javascript:sendSms()" id="zphone" class="sms-btn"><?php echo $this->_var['lang']['getMobile_code']; ?></a>
                                    <label class="error" id="phone_captcha"><i></i></label>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-label"><?php echo $this->_var['lang']['comment_captcha']; ?>：</div>
                                <div class="form-value">
                                    <input class="form-input authCode txt-4" name="authCode" id="authCode" type="text" value="">
                                    <img src="captcha_verify.php?captcha=change_password_f&<?php echo $this->_var['rand']; ?>" alt="captcha" id="captcha_img" class="fl mr10" onClick="this.src='captcha_verify.php?captcha=change_password_f&'+Math.random()" width="100" height="40" />
                                    <label class="error" id="code_notice"><i></i></label>
                                </div>
                            </div>
                            
                            <div class="form-btn-wp">
                                <input id="flag" type="hidden" value="change_password_f" name="flag">
                                <input id="seccode" type="hidden" value="<?php echo $this->_var['sms_security_code']; ?>" name="seccode">
                                <input type="hidden" value="mobile" name="sign">

                                <input type="hidden" value="account_safe" name="act">
                                <input type="hidden" value="change_phone" name="type">
                                <input type="hidden" value="second" name="step">

                                <input type="submit" class="form-btn form-btn-line" value="<?php echo $this->_var['lang']['button_submit']; ?>">
                            </div>
                        </form>
                        <?php elseif ($this->_var['sign'] == 'email'): ?>
                        <form name="change_email_s" method="post" action="user.php" onSubmit="return submitSurplus(this)" class="user-form user-form-safe">
                            <div class="form-row">
                                <div class="form-label"><?php echo $this->_var['lang']['Verified_mailbox']; ?>：</div>
                                <div class="form-value">
                                    <?php echo $this->_var['user_info']['email']; ?>
                                    <input id="change_email" type="hidden" value="<?php echo $this->_var['user_info']['email']; ?>" />
                                    <input id="mobile_phone" type="hidden" value="<?php echo $this->_var['user_info']['mobile_phone']; ?>" />
                                    <?php if ($this->_var['validate_info']['mobile_phone']): ?>
                                    <b><a href="user.php?act=account_safe&type=change_phone&sign=mobile" class="ftx-14"><?php echo $this->_var['lang']['Verify_phone_user']; ?></a></b>
                                    <?php endif; ?>
                                    <?php if ($this->_var['validate_info']['pay_password']): ?>
                                    <b><a href="user.php?act=account_safe&type=change_phone&sign=paypwd" class="ftx-14"><?php echo $this->_var['lang']['Verify_password_in']; ?></a></b>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-label"><?php echo $this->_var['lang']['comment_captcha']; ?>：</div>
                                <div class="form-value">
                                    <input class="form-input authCode txt-4" name="authCode" id="authCode" type="text" value="">
                                    <img src="captcha_verify.php?captcha=change_password_f&<?php echo $this->_var['rand']; ?>" alt="captcha" id="captcha_img" class="fl mr10" onClick="this.src='captcha_verify.php?captcha=change_password_f&'+Math.random()" width="100" height="40" />
                                    <label class="error" id="code_notice"><i></i></label>
                                </div>
                            </div>
                            
                            <div class="form-btn-wp">
                                <a id="sendMail" href="javascript:;" onclick="sendChangeEmail('change_mobile');" class="form-btn form-btn-line"><?php echo $this->_var['lang']['send_verify_email']; ?></a>
                            </div>
                        </form>
                        <?php elseif ($this->_var['sign'] == 'paypwd'): ?>
                        <form name="formUser" method="post" action="user.php" onSubmit="return submitSurplus(this)" class="user-form user-form-safe">
                            <div class="form-row">
                                <div class="form-label w150 tr"><?php echo $this->_var['lang']['input_pay_password']; ?>：</div>
                                <div class="form-value">
                                    <input type="password"   style="display:none"/>
                                    <input class="form-input" type="password" name="pay_password" tabindex="1" id="pay_password">
                                    <?php if ($this->_var['validate_info']['is_validated'] && $this->_var['validate_info']['email']): ?>
                                    <b><a href="user.php?act=account_safe&type=change_phone&sign=email" class="ftx-14"><?php echo $this->_var['lang']['Verify_email_in']; ?></a></b>
                                    <?php endif; ?>
                                    <?php if ($this->_var['validate_info']['pay_password']): ?>
                                    <b><a href="user.php?act=account_safe&type=change_phone&sign=mobile" class="ftx-14"><?php echo $this->_var['lang']['Verify_phone_user']; ?></a></b>
                                    <?php endif; ?>
                                    <label class="error" id="pay_password_notice"><i></i></label>
                                </div>
                            </div>
                            
                            <div class="form-row">
                                <div class="form-label w150 tr"><?php echo $this->_var['lang']['comment_captcha']; ?>：</div>
                                <div class="form-value">
                                    <input class="form-input authCode txt-4" name="authCode" id="authCode" type="text" value="">
                                    <img src="captcha_verify.php?captcha=change_password_f&<?php echo $this->_var['rand']; ?>" alt="captcha" id="captcha_img" class="fl mr10" onClick="this.src='captcha_verify.php?captcha=change_password_f&'+Math.random()" width="100" height="40" />
                                    <label class="error" id="code_notice"><i></i></label>
                                </div>
                            </div>

                            <div class="form-btn-wp" style=" margin:30px 0 20px 169px;">
                                <input id="flag" type="hidden" value="change_password_f" name="flag">
                                <input id="seccode" type="hidden" value="<?php echo $this->_var['sms_security_code']; ?>" name="seccode">
                                <input type="hidden" value="paypwd" name="sign">

                                <input type="hidden" value="account_safe" name="act">
                                <input type="hidden" value="change_phone" name="type">
                                <input type="hidden" value="second" name="step">

                                <input type="submit" id="submitCode" class="form-btn form-btn-line" value="<?php echo $this->_var['lang']['submit_goods']; ?>">
                            </div>
                        </form>
                        <?php endif; ?>
                    </div>
                    
                    <?php if ($this->_var['sign'] == 'validate_mail_ok'): ?>
                    <div class="user-pwd-prompt user-prompt-ok">
                        <s class="icon-succ02 m-icon"></s>
                        <div class="fore">
                            <h3><span class="ftx-02"><?php echo $this->_var['lang']['send_email_in']; ?>：</span><?php echo $this->_var['user_info']['email']; ?>&nbsp;&nbsp;</h3>
                            <div class="ftx-03"><?php echo $this->_var['lang']['send_email_desc_one']; ?></div>
                            <a class="sc-btn btn35 mt30" href="javascript:history.back();"><?php echo $this->_var['lang']['send_email_desc_two']; ?></a>
                        </div>
                    </div>
                    <?php endif; ?>
                </div>
                <?php elseif ($this->_var['step'] == 'second'): ?>
                <div class="form">
                    <div class="security-warp">
                        <form name="formUser" method="post" action="user.php" onSubmit="return submitSurplus(this)" class="user-form user-form-safe">
                            <div class="form-row">
                                <div class="form-label"><?php echo $this->_var['lang']['label_mobile']; ?>：</div>
                                <div class="form-value">
                                    <input class="form-input" type="text" name="mobile_phone" tabindex="1" id="mobile_phone" <?php if ($this->_var['mobile_phone']): ?> value="<?php echo $this->_var['mobile_phone']; ?>"<?php endif; ?>>
                                    <div class="error" id="phone_notice"></div>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-label"><?php echo $this->_var['lang']['bindMobile_code']; ?>：</div>
                                <div class="form-value">
                                    <input class="itxt" name="mobile_phone" id="mobile_phone" value="<?php echo $this->_var['user_info']['mobile_phone']; ?>" type="hidden">
                                    <input name="sms_value" id="sms_value" type="hidden" value="sms_code" class="text text-2" />
                                    <input class="form-input" type="text" name="mobile_code" tabindex="1" id="mobile_code" disabled="disabled">
                                    <a href="javascript:sendSms()" id="zphone" class="sms-btn"><?php echo $this->_var['lang']['getMobile_code']; ?></a>
                                    <div class="error" id="phone_captcha"></div>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-label"><?php echo $this->_var['lang']['comment_captcha']; ?>：</div>
                                <div class="form-value">
                                    <input class="form-input authCode txt-4" name="authCode" id="authCode" type="text" value="">
                                    <img src="captcha_verify.php?captcha=change_password_f&<?php echo $this->_var['rand']; ?>" alt="captcha" id="captcha_img" class="fl mr10" onClick="this.src='captcha_verify.php?captcha=change_password_f&'+Math.random()" width="100" height="40" />
                                    <div class="error" id="code_notice"></div>
                                </div>
                            </div>
                            
                            <div class="form-btn-wp">
                                <?php if ($this->_var['validate_info']['mobile_phone']): ?>
                                <input id="carry" type="hidden" value="insert" name="carry">
                                <?php else: ?>
                                <input id="carry" type="hidden" value="update" name="carry">
                                <?php endif; ?>
                                <input id="flag" type="hidden" value="change_mobile" name="flag">
                                <input id="seccode" type="hidden" value="<?php echo $this->_var['sms_security_code']; ?>" name="seccode">

                                <input type="hidden" name="act" value="account_safe" />
                                <input type="hidden" name="type" value="change_phone" />
                                <input type="hidden" name="step" value="last" />

                                <input type="submit" class="form-btn form-btn-line" value="<?php echo $this->_var['lang']['lang_crowd_next_step']; ?>">
                            </div>
                        </form>
                    </div>
                    <?php elseif ($this->_var['step'] == 'last'): ?>
                    <div class="user-pwd-prompt user-prompt-ok">
                        <s class="icon-succ02 m-icon"></s>
                        <div class="fore">
                            <h3><?php echo $this->_var['lang']['bind_phone_user']; ?></h3>
                            <div class="u-safe"><?php echo $this->_var['lang']['security_rating_one']; ?>：<i class="safe-rank0<?php echo $this->_var['security_rating']['count']; ?>" id="cla"></i><strong class="rank-text ftx-04"><?php echo $this->_var['security_rating']['count_info']; ?></strong></div>
                            <div class="ftx-03"><?php echo $this->_var['lang']['security_rating_two']; ?><a href="user.php?act=account_safe" class="ftx-05"><?php echo $this->_var['lang']['Security_Center']; ?></a><?php echo $this->_var['lang']['security_rating_three']; ?></div>
                        </div>
                    </div>
                    <?php endif; ?>
                </div>
            </div>
            
            <?php elseif ($this->_var['type'] == 'payment_password'): ?>
            <div class="type">
                <div class="user-title">
                    <h2><?php echo $this->_var['lang']['pay_password_Management']; ?></h2>
                </div>
                <?php if ($this->_var['step'] != 'zero'): ?>
                <div class="stepflex ">
                    <dl class="first <?php if ($this->_var['step'] == 'first'): ?>doing<?php elseif ($this->_var['step'] == 'second' || $this->_var['step'] == 'last'): ?>done<?php endif; ?>">
                        <dt class="s-num">1</dt>
                        <dd class="s-text"><?php echo $this->_var['lang']['Verify_identity']; ?><s></s><b></b></dd>
                        <dd></dd>
                    </dl>
                    <dl class="normal <?php if ($this->_var['step'] == 'second'): ?>doing<?php elseif ($this->_var['step'] == 'last'): ?>done<?php endif; ?>">
                        <dt class="s-num">2</dt>
                        <?php if ($this->_var['validate_info']['pay_password']): ?>
                        <dd class="s-text"><?php echo $this->_var['lang']['edit_pay_password']; ?><s></s><b></b></dd>
                        <?php else: ?>
                        <dd class="s-text"><?php echo $this->_var['lang']['Enable_pay_password']; ?><s></s><b></b></dd>
                        <?php endif; ?>
                    </dl>
                    
                    <dl class="last <?php if ($this->_var['step'] == 'last'): ?>doing<?php endif; ?>">
                        <?php if ($this->_var['step'] == 'last'): ?>
                        <dt class="s-num">3</dt>
                        <?php else: ?>
                        <dt class="s-num">&nbsp;</dt>
                        <?php endif; ?>
                        <dd class="s-text"><?php echo $this->_var['lang']['complete']; ?><s></s><b></b></dd>
                    </dl>
                </div>
                <?php endif; ?>
               
                <?php if ($this->_var['step'] == 'zero'): ?>
                <div class="user-pwd-prompt user-prompt-ok" style="padding-top:80px;">
                    <div class="fore">
                        <h3 class="ftx-02"><?php echo $this->_var['lang']['pay_password_Prompt']; ?></h3>
                        <div class="ftx-03">
                            <a href="user.php?act=account_safe&type=payment_password&sign=paypwd" class="sc-btn btn35"><?php echo $this->_var['lang']['edit_pay_password']; ?></a>
                            <a href="user.php?act=account_safe&type=payment_password&sign=paypwd" style="font-size:12px;"><?php echo $this->_var['lang']['forgot_paypassword']; ?></a>
                        </div>
                    </div>
                </div>
                <?php endif; ?>

                <?php if ($this->_var['step'] == 'first'): ?>
                <div class="form">
                    <div class="security-warp">
                    <?php if ($this->_var['sign'] == 'mobile'): ?>
                    <form name="formUser" method="post" action="user.php" onSubmit="return submitSurplus(this)" class="user-form user-form-safe">
                        <div class="form-row">
                            <div class="form-label"><?php echo $this->_var['lang']['Verify_phone_in']; ?>：</div>
                            <div class="form-value">
                                <?php echo $this->_var['user_info']['mobile_phone']; ?>
                                <input id="mobile_phone" type="hidden" value="<?php echo $this->_var['user_info']['mobile_phone']; ?>" />
                                <?php if ($this->_var['validate_info']['is_validated'] && $this->_var['validate_info']['email']): ?>
                                <b><a href="user.php?act=account_safe&type=payment_password&sign=email" class="ftx-14"><?php echo $this->_var['lang']['Verify_email_in']; ?></a></b>
                                <?php endif; ?>
                                <?php if ($this->_var['validate_info']['pay_password']): ?>
                                <b><a href="user.php?act=account_safe&type=payment_password&sign=paypwd" class="ftx-14"><?php echo $this->_var['lang']['Verify_password_in']; ?></a></b>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-label"><?php echo $this->_var['lang']['bindMobile_code']; ?>：</div>
                            <div class="form-value">
                                <input class="itxt" name="mobile_phone" id="mobile_phone" value="<?php echo $this->_var['user_info']['mobile_phone']; ?>" type="hidden">
                                <input name="sms_value" id="sms_value" type="hidden" value="sms_code" class="text text-2" />
                                <input class="form-input" type="text" name="mobile_code" tabindex="1" id="mobile_code" disabled="disabled"><a href="javascript:sendSms()" id="zphone" class="sms-btn"><?php echo $this->_var['lang']['getMobile_code']; ?></a>
                                <label class="error" id="phone_captcha"><i></i></label>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-label"><?php echo $this->_var['lang']['comment_captcha']; ?>：</div>
                            <div class="form-value">
                                <input class="form-input authCode txt-4" name="authCode" id="authCode" type="text" value="">
                                <img src="captcha_verify.php?captcha=change_password_f&<?php echo $this->_var['rand']; ?>" alt="captcha" id="captcha_img" class="fl mr10" onClick="this.src='captcha_verify.php?captcha=change_password_f&'+Math.random()" width="100" height="40" />
                                <label class="error" id="code_notice"><i></i></label>
                            </div>
                        </div>
                        
                        <div class="form-btn-wp">
                            <input id="flag" type="hidden" value="change_password_f" name="flag">
                            <input id="seccode" type="hidden" value="<?php echo $this->_var['sms_security_code']; ?>" name="seccode">
                            <input type="hidden" value="account_safe" name="act">
                            <input type="hidden" value="payment_password" name="type">
                            <input type="hidden" value="second" name="step">

                            <input type="submit" class="form-btn form-btn-line" value="<?php echo $this->_var['lang']['button_submit']; ?>">
                        </div>
                    </form>
                    <?php elseif ($this->_var['sign'] == 'email'): ?>
                    <form name="change_email_s" method="post" action="user.php" onSubmit="return submitSurplus(this)" class="user-form user-form-safe">
                        <div class="form-row">
                            <div class="form-label"><?php echo $this->_var['lang']['Verified_mailbox']; ?>：</div>
                            <div class="form-value">
                                <?php echo $this->_var['user_info']['email']; ?>
                                <input id="change_email" type="hidden" value="<?php echo $this->_var['user_info']['email']; ?>" />
                                <input id="mobile_phone" type="hidden" value="<?php echo $this->_var['user_info']['mobile_phone']; ?>" />
                                <?php if ($this->_var['validate_info']['mobile_phone']): ?>
                                <b><a href="user.php?act=account_safe&type=payment_password&sign=mobile" class="ftx-14"><?php echo $this->_var['lang']['Verify_phone_user']; ?></a></b>
                                <?php endif; ?>
                                <?php if ($this->_var['validate_info']['pay_password']): ?>
                                <b><a href="user.php?act=account_safe&type=payment_password&sign=paypwd" class="ftx-14"><?php echo $this->_var['lang']['Verify_password_in']; ?></a></b>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-label"><?php echo $this->_var['lang']['comment_captcha']; ?>：</div>
                            <div class="form-value">
                                <input class="form-input authCode txt-4" name="authCode" id="authCode" type="text" value="">
                                <img src="captcha_verify.php?captcha=change_password_f&<?php echo $this->_var['rand']; ?>" alt="captcha" id="captcha_img" class="fl mr10" onClick="this.src='captcha_verify.php?captcha=change_password_f&'+Math.random()" width="100" height="40" />
                                <label class="error" id="code_notice"><i></i></label>
                            </div>
                        </div>
                        
                        <div class="form-btn-wp">
                            <a id="sendMail" href="javascript:;" onclick="sendChangeEmail('change_paypwd');" class="form-btn form-btn-line"><?php echo $this->_var['lang']['send_verify_email']; ?></a>
                        </div>
                    </form>
                    <?php elseif ($this->_var['sign'] == 'paypwd'): ?>
                    <form name="formUser" method="post" action="user.php" onSubmit="return submitSurplus(this)" class="user-form user-form-safe">
                        <div class="form-row">
                            <div class="form-label w150 tr"><?php echo $this->_var['lang']['input_pay_password']; ?>：</div>
                            <div class="form-value">
                                <input type="password"   style="display:none"/>
                                <input class="form-input" type="password" name="pay_password" tabindex="1" id="pay_password">
                                <?php if ($this->_var['validate_info']['is_validated'] && $this->_var['validate_info']['email']): ?>
                                <b><a href="user.php?act=account_safe&type=payment_password&sign=email" class="ftx-14"><?php echo $this->_var['lang']['Verify_email_in']; ?></a></b>
                                <?php endif; ?>
                                <?php if ($this->_var['validate_info']['pay_password']): ?>
                                <b><a href="user.php?act=account_safe&type=payment_password&sign=mobile" class="ftx-14"><?php echo $this->_var['lang']['Verify_phone_user']; ?></a></b>
                                <?php endif; ?>
                                <label class="error" id="pay_password_notice"><i></i></label>
                            </div>
                        </div>
                        
                        <div class="form-row">
                            <div class="form-label w150 tr"><?php echo $this->_var['lang']['comment_captcha']; ?>：</div>
                            <div class="form-value">
                                <input class="form-input authCode txt-4" name="authCode" id="authCode" type="text" value="">
                                <img src="captcha_verify.php?captcha=change_password_f&<?php echo $this->_var['rand']; ?>" alt="captcha" id="captcha_img" class="fl mr10" onClick="this.src='captcha_verify.php?captcha=change_password_f&'+Math.random()" width="100" height="40" />
                                <label class="error" id="code_notice"><i></i></label>
                            </div>
                        </div>

                        <div class="form-btn-wp" style="margin:30px 0 20px 169px;">
                            <input id="flag" type="hidden" value="change_password_f" name="flag">
                            <input id="seccode" type="hidden" value="<?php echo $this->_var['sms_security_code']; ?>" name="seccode">
                            <input type="hidden" value="paypwd" name="sign">

                            <input type="hidden" value="account_safe" name="act">
                            <input type="hidden" value="payment_password" name="type">
                            <input type="hidden" value="second" name="step">

                            <input type="submit" id="submitCode" class="form-btn form-btn-line" value="<?php echo $this->_var['lang']['submit_goods']; ?>">
                        </div>
                    </form>
                    <?php endif; ?>
                    </div>
                    <?php if ($this->_var['sign'] == 'validate_mail_ok'): ?>
                    <div class="user-pwd-prompt user-prompt-ok">
                        <s class="icon-succ02 m-icon"></s>
                        <div class="fore">
                            <h3><span class="ftx-02"><?php echo $this->_var['lang']['send_email_in']; ?>：</span><?php echo $this->_var['user_info']['email']; ?>&nbsp;&nbsp;</h3>
                            <div class="ftx-03"><?php echo $this->_var['lang']['send_email_desc_one']; ?></div>
                            <a class="sc-btn btn35 mt30" href="javascript:history.back();"><?php echo $this->_var['lang']['send_email_desc_two']; ?></a>
                        </div>
                    </div>
                    <?php endif; ?>
                </div>
                <?php elseif ($this->_var['step'] == 'second'): ?>
                <div class="form pl180">
                    <form class="user-form user-form-safe" action="user.php" name="payment_password" method="POST" onsubmit="return submitSurplus(this)">
                        <div class="form-row">
                            <div class="form-label w120"><?php echo $this->_var['lang']['pay_password']; ?>：</div>
                            <div class="form-value"><input type="password"   style="display:none"/><input class="form-input" type="password" name="new_password" id="new_password"></div>
                            <div id="new_password_error" class="msg-error"></div>
                        </div>
                        <div class="form-row">
                            <div class="form-label w120"><?php echo $this->_var['lang']['confirm_pay_password']; ?>：</div>
                            <div class="form-value"><input type="password"   style="display:none"/><input type="password" name="re_new_password" id="re_new_password" class="form-input"></div>
                        </div>
                        <div class="form-row ftx-04 mb10"><?php echo $this->_var['lang']['Enable_pay_password_desc']; ?></div>
                        <div class="form-row">
                            <div class="form-label w120">&nbsp;</div>
                            <div class="form-value">
                                <div class="fl mr10">
                                    <input type="checkbox" <?php if ($this->_var['user_paypwd']['pay_online']): ?> checked="checked" <?php endif; ?> name="pay_online" id="pay_online" value="1" class="ui-checkbox">
                                    <label class="ui-label" for="pay_online"><?php echo $this->_var['lang']['pay_online']; ?></label>
                                </div>
                                <div class="fl">
                                    <input type="checkbox" <?php if ($this->_var['user_paypwd']['user_surplus']): ?> checked="checked" <?php endif; ?> name="user_surplus" id="user_surplus" value="1" class="ui-checkbox">
                                    <label class="ui-label" for="user_surplus"><?php echo $this->_var['lang']['balance_pay']; ?></label>
                                </div>
                            </div>
                        </div>
                        <div class="form-btn-wp" style="margin:20px 0 20px 140px;">
                            <input type="hidden" value="account_safe" name="act">
                            <input type="hidden" value="payment_password" name="type">
                            <input type="hidden" value="last" name="step">
                            <input type="submit" class="form-btn form-btn-line" id="submit_pay" value="<?php echo $this->_var['lang']['submit_goods']; ?>">
                        </div>
                    </form>
                </div>
                <?php elseif ($this->_var['step'] == 'last'): ?>
                <div class="user-pwd-prompt user-prompt-ok">
                    <s class="icon-succ02 m-icon"></s>
                    <div class="fore">
                        <h3><?php echo $this->_var['lang']['Enable_pay_password_notice']; ?></h3>
                        <div class="u-safe"><?php echo $this->_var['lang']['security_rating_one']; ?>：<i class="safe-rank0<?php echo $this->_var['security_rating']['count']; ?>" id="cla"></i><strong class="rank-text ftx-04"><?php echo $this->_var['security_rating']['count_info']; ?></strong></div>
                        <div class="ftx-03"><?php echo $this->_var['lang']['security_rating_two']; ?><a href="user.php?act=account_safe" class="ftx-05"><?php echo $this->_var['lang']['Security_Center']; ?></a><?php echo $this->_var['lang']['security_rating_three']; ?></div>
                    </div>
                </div>
                <?php endif; ?>
            </div>
            
            <?php elseif ($this->_var['type'] == 'real_name'): ?>
            <div class="type">
                <div class="user-title">
                    <h2><?php echo $this->_var['lang']['16_users_real']; ?></h2>
                </div>
                <?php if ($this->_var['step'] == 'first'): ?>
                <div class="account-main account-bind">
                    <div class="user-items">
                        <form name="real_name" method="post" action="user.php" enctype="multipart/form-data" onSubmit="return submitSurplus(this)" class="user-form user-form-safe">
                            <div class="item">
                                <div class="label"><?php echo $this->_var['lang']['Real_name']; ?>：</div>
                                <div class="value">
                                    <input class="text text-1" type="text" id="real_name" name="real_name" value="<?php echo $this->_var['real_user']['real_name']; ?>">
                                    <div id="span-notify-holderName" class="notic"><?php echo $this->_var['lang']['Real_name_notice']; ?></div>
                                    <div id="span-red-holderName" class="error-text" style="display: none;"><?php echo $this->_var['lang']['Real_name_input']; ?></div>
                                    <label class="error" id="real_name_notice"><i></i></label>
                                </div>
                            </div>
                            <div class="item">
                                <div class="label"><?php echo $this->_var['lang']['number_ID']; ?>：</div>
                                <div class="value">
                                    <input class="text text-5" type="text" id="self_num" name="self_num" value="<?php echo $this->_var['real_user']['self_num']; ?>">
                                    <label class="error" id="self_num_notice"><i></i></label>
                                </div>
                            </div>
                            <div class="item">
                                <div class="label"><?php echo $this->_var['lang']['bank']; ?>名称：</div>
                                <div class="value">
                                    <input class="text text-1" type="text" id="bank_name" name="bank_name" value="<?php echo $this->_var['real_user']['bank_name']; ?>">
                                    <div class="notic">请填写开户行详情名称：中国工商银行（徐汇支行）</div>
                                    <label class="error" id="bank_name_notice"><i></i></label>
                                </div>
                            </div>
                            
                            <div class="item">
                                <div class="label"><?php echo $this->_var['lang']['bank_card']; ?>：</div>
                                <div class="value">
                                    <input class="text text-5" type="text" id="bank_card" value="<?php echo $this->_var['real_user']['bank_card']; ?>" name="bank_card" ectype="bank_card">
                                    <label class="error" id="bank_card_notice"><i></i></label>
                                    <label class="error" ectype="bname"></label>
                                </div>
                            </div>
                            
                            <div class="item">
                                <div class="label">身份证正面：</div>
                                <div class="value">
                                    <div class="value-file">
                                        <input type="button" class="sc-btn sc-redBg-btn" value="<?php echo $this->_var['lang']['Select_file']; ?>">
                                        <input type="text" name="textfield" id="textfield" class="txt">
                                        <input type="file" name="front_of_id_card" class="file" id="fileField" size="28" onchange="document.getElementById('textfield').value=this.value">
                                    </div>
                                    <label class="error" id="front_pic"></label>
                                </div>
                            </div>
                            <div class="item">
                                <div class="label">身份证反面：</div>
                                <div class="value">
                                    <div class="value-file">
                                        <input type="button" class="sc-btn sc-redBg-btn" value="<?php echo $this->_var['lang']['Select_file']; ?>">
                                        <input type="text" name="textfield1" id="textfield1" class="txt">
                                        <input type="file" name="reverse_of_id_card" class="file" id="fileField1" size="28" onchange="document.getElementById('textfield1').value=this.value">
                                    </div>
                                    <label class="error" id="reverse_pic"></label>
                                </div>
                            </div>
                            <div class="item">
                                <div class="label"><?php echo $this->_var['lang']['label_mobile']; ?>：</div>
                                <div class="value">
                                    <input class="text text-1" type="text"id="mobile_phone" name="mobile_phone" value="<?php echo $this->_var['real_user']['bank_mobile']; ?>">
                                    <span id="span-phone-modify" class="error-text" style="display: none;"><?php echo $this->_var['lang']['label_mobile_input']; ?></span>
                                    <label class="error" id="phone_notice"></label>
                                </div>
                            </div>
                            <?php if ($this->_var['enabled_sms_signin']): ?>
                            <div class="item">
                                <div class="label"><?php echo $this->_var['lang']['bindMobile_code']; ?>：</div>
                                <div class="value">
                                    <div class="sm-input">
                                        <input name="sms_value" id="sms_value" type="hidden" value="sms_code" />
                                        <input type="text" name="mobile_code" tabindex="1" id="mobile_code" disabled="disabled">
                                        <a href="javascript:sendSms()" id="zphone" class="sms-btn"><?php echo $this->_var['lang']['getMobile_code']; ?></a>
                                    </div>
                                    <label class="error" id="phone_captcha"></label>
                                </div>
                            </div>
                            <?php endif; ?>
                            <div class="item item-button">
                                <div class="label">&nbsp;</div>
                                <div class="value">
                                    <input id="flag" type="hidden" value="change_password_f" name="flag">
                                    <input id="seccode" type="hidden" value="<?php echo $this->_var['sms_security_code']; ?>" name="seccode">
                                    <input type="hidden" value="account_safe" name="act">
                                    <input type="hidden" value="real_name" name="type">
                                    <input type="hidden" value="second" name="step">
                                    <input type="hidden" value="<?php echo $this->_var['operate']; ?>" name="operate">
                                    <input type="submit" id="authSubmit" class="sc-btn sc-redBg-btn" value="提交">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <?php endif; ?>
                
                <?php if ($this->_var['step'] == 'realname_ok'): ?>
                <div class="account-main account-bind">
                    <div class="user-items">
                        <div class="item">
                            <div class="label"><?php echo $this->_var['lang']['Real_name']; ?>：</div>
                            <div class="value"><span class="txt-lh"><?php echo $this->_var['real_user']['real_name']; ?></span></div>
                        </div>
                        <div class="item">
                            <div class="label"><?php echo $this->_var['lang']['number_ID']; ?>：</div>
                            <div class="value"><span class="txt-lh"><?php echo $this->_var['real_user']['self_num']; ?></span></div>
                        </div>
                        <div class="item">
                            <div class="label"><?php echo $this->_var['lang']['bank']; ?>：</div>
                            <div class="value"><span class="txt-lh"><?php echo $this->_var['real_user']['bank_name']; ?></span></div>
                        </div>
                        <div class="item">
                            <div class="label"><?php echo $this->_var['lang']['bank_card']; ?>：</div>
                            <div class="value"><span class="txt-lh"><?php echo $this->_var['real_user']['bank_card']; ?></span></div>
                        </div>
                        <div class="item">
                            <div class="label"><?php echo $this->_var['lang']['label_mobile']; ?>：</div>
                            <div class="value">
                                <span class="txt-lh"><?php echo $this->_var['real_user']['bank_mobile']; ?></span>
                                <a href="user.php?act=account_safe&type=change_phone" class="ftx-05 ml10"><?php echo $this->_var['lang']['modify']; ?></a>
                            </div>
                        </div>
                        <div class="item">
                            <div class="label">身份证正面：</div>
                            <div class="value">
                                <a href="<?php echo $this->_var['real_user']['front_of_id_card']; ?>" target="_blank">
                                    <img style="width:120px;height:72px;" src="<?php echo $this->_var['real_user']['front_of_id_card']; ?>"/>
                                </a>
                            </div>
                        </div>
                        <div class="item">
                            <div class="label">身份证反面：</div>
                            <div class="value">
                                <a href="<?php echo $this->_var['real_user']['reverse_of_id_card']; ?>" target="_blank">
                                    <img style="width:120px;height:72px;" src="<?php echo $this->_var['real_user']['reverse_of_id_card']; ?>"/>
                                </a>
                            </div>
                        </div>
                        <div class="item">
                            <div class="label"><?php echo $this->_var['lang']['Verify_time']; ?>：</div>
                            <div class="value">
                                <span class="txt-lh"><?php echo $this->_var['real_user']['validate_time']; ?></span>
                            </div>
                        </div>
                        <div class="item">
                            <div class="label"><?php echo $this->_var['lang']['adopt_status']; ?>：</div>
                            <div class="value">
                                <span class="txt-lh red"><?php if ($this->_var['real_user']['review_status'] == 1): ?><?php echo $this->_var['lang']['is_confirm']['1']; ?><?php elseif ($this->_var['real_user']['review_status'] == 2): ?><?php echo $this->_var['lang']['is_confirm']['2']; ?><?php else: ?><?php echo $this->_var['lang']['is_confirm']['0']; ?><?php endif; ?></span>
                            </div>
                        </div>

                        <div class="item item-button">
                            <div class="label">&nbsp;</div>
                            <div class="value">
                                <a href="<?php echo $this->_var['edit_user']; ?>" class="sc-btn sc-redBg-btn">修改实名认证</a>
                            </div>
                        </div>
                    </div>
                </div>
                <?php endif; ?>
            </div>
            <?php endif; ?>
        </div>
        <script type="text/javascript">
            // 邮件的发送 qin
            function sendChangeEmail(mail_type)
            {
                var authCode = $('#authCode').val();
                var mail_address = $('#change_email').val();
                var mail_address_data = '';
                // var mail_address = $('#change_email').val(); 暂时没有
                var mail_url = '';
                var location_href_url = '';
                if (mail_type == 'change_pwd')
                {
                    mail_url = "user.php?is_ajax=1&act=account_safe&type=change_email&step=second_email_verify&mail_type=change_pwd";
                    location_href_url = "user.php?act=account_safe&type=change_password&step=first&sign=validate_mail_ok";
                }
                if (mail_type == 'change_mail')
                {
                    mail_url = "user.php?is_ajax=1&act=account_safe&type=change_email&step=second_email_verify&mail_type=change_mail";
                    location_href_url = "user.php?act=account_safe&type=change_email&step=first&sign=validate_mail_ok";
                }
                else if (mail_type == 'change_mobile')
                {
                    mail_url = "user.php?is_ajax=1&act=account_safe&type=change_email&step=second_email_verify&mail_type=change_mobile";
                    location_href_url = "user.php?act=account_safe&type=change_phone&step=first&sign=validate_mail_ok";
                }
                else if (mail_type == 'change_paypwd')
                {
                    mail_url = "user.php?is_ajax=1&act=account_safe&type=change_email&step=second_email_verify&mail_type=change_paypwd";
                    location_href_url = "user.php?act=account_safe&type=payment_password&step=first&sign=validate_mail_ok";
                }
                else if (mail_type == 'validate_mail')
                {
                    mail_url = "user.php?is_ajax=1&act=account_safe&type=change_email&step=second_email_verify&mail_type=validate_mail";
                    location_href_url = "user.php?act=account_safe&type=change_email&step=first&sign=validate_mail_ok";
                }
                else if (mail_type == 'edit_mail')
                { // 更改邮箱
                    // 验证邮箱地址
                    if (mail_address.length == 0)
                    {
                        $("#change_email_notice").removeClass().addClass("error");
                        $("#change_email_notice").html(json_languages.null_email);
                        msg += json_languages.null_email_user + '\n';
                    }
                    else
                    {
                        // 检查邮箱格式 
                        // .............
                        if (0)
                        {
                            $("#change_email_notice").removeClass().addClass("error");
                            $("#change_email_notice").html("<i></i>"+json_languages.email_error);
                            msg += json_languages.email_error + '\n';
                        }
                        else
                        {
                            $("#change_email_notice").html("<i></i>");
                        }
                    }
                    
                    var isValidated = '';
                    if($(":input[name='is_validated']").size() == 1){
                        isValidated = "&validated=1"
                    }
        
                    mail_url = "user.php?is_ajax=1&act=account_safe&type=change_email&step=second_email_verify&mail_type=edit_mail" + isValidated;
                    location_href_url = "user.php?act=account_safe&type=change_email&step=second&sign=edit_email_ok";
                }
        
                var msg = '';
                
                if(authCode.length == 0)
                {
                    $("#code_notice").removeClass().addClass("error");
                    $("#code_notice").html(json_languages.null_captcha);
                    msg += json_languages.null_captcha_login + '\n';
                }
                else
                {
                    //验证验证码是否正确
                    $.ajax({
                        cache: false,
                        async: false,
                        type: 'POST',
                        data: {authCode: authCode},
                        url: "user.php?act=account_safe&type=change_password&verify=authcode",
                        success: function (res) {
                            var result = eval("("+res+")");
                            if (result.error)
                            {
                                $("#code_notice").removeClass().addClass("error");
                                $("#code_notice").html("<i></i>"+result.message);
                                msg += result.message + '\n';
                                
                                return false;
                            }
                            else
                            {
                                $("#code_notice").removeClass().addClass("error");
                                $("#code_notice").html("<i></i>");
                            }
                        }
                    });  
                }
        
                if (msg.length > 0)
                {
                    return false;
                }
        
                //发送验证邮件
                $.ajax({
                    cache: false,
                    async: false,
                    type: 'POST',
                    data: {mail_address_data: mail_address},
                    url: mail_url,
                    success: function (res) {
                        var result = eval("("+res+")");
                        if (result.error)
                        {
                            $("#code_notice").removeClass().addClass("error");
                            $("#code_notice").html("<i></i>"+result.message);
                            msg += result.message + '\n';
                            
                            return false;
                        }
                        else
                        {
                            // alert(location_href_url);
                            window.location.href=location_href_url;
                        }
                    }
                });
            }
        
            // 验证 qin
            function submitSurplus(obj)
            {
                var form_name = $(obj).attr("name");
                var frm  = document.forms[form_name];
        
                var mobile_code  = frm.elements['mobile_code'] ? frm.elements['mobile_code'].value : ''; // 手机验证码身份验证
                var authCode  = frm.elements['authCode'] ? frm.elements['authCode'].value : ''; // 验证码身份验证
                var pay_password  = frm.elements['pay_password'] ? frm.elements['pay_password'].value : ''; // 支付密码身份验证
        
                var new_password  = frm.elements['new_password'] ? frm.elements['new_password'].value : 'ha'; // 修改密码
                var re_new_password  = frm.elements['re_new_password'] ? frm.elements['re_new_password'].value : 'hahaha'; // 确认密码
        
                var msg = "";
        
                // 手机验证码
                if(frm.elements['mobile_code'])
                {
                    if(mobile_code == '')
                    {
                        $("#phone_captcha").removeClass().addClass("error");
                        $("#phone_captcha").html("<i></i>"+ json_languages.SMS_code_empty);
                        msg += json_languages.SMS_code_empty + '\n';
                    }
                    else
                    {
                        //验证短信是否正确
                        $.ajax({
                           cache: false,
                           async: false,
                           type: 'POST',
                           data: {mobile_code: mobile_code},
                           url: "user.php?act=account_safe&type=change_password&verify=mobilecode",
                           success: function (res) {
                                var result = eval("("+res+")");
                                if (result.error)
                                {
                                    $("#phone_captcha").removeClass().addClass("error");
                                    $("#phone_captcha").html("<i></i>"+result.message);
                                    msg += result.message + '\n';
        
                                    return false;
                                }
                                else
                                {
                                    $("#phone_captcha").removeClass().addClass("error");
                                    $("#phone_captcha").html("<i></i>");
                                }
                            }
                          });  
                    }
                }
                // 支付密码
                if(frm.elements['pay_password'])
                {
                    if(pay_password == '')
                    {
                        $("#pay_password_notice").removeClass().addClass("error");
                        $("#pay_password_notice").html("<i></i>"+json_languages.pay_password_packup_null);
                        msg += json_languages.pay_password_packup_null + '\n';
                    }
                    else
                    {
                        //验证支付密码是否正确
                        $.ajax({
                            cache: false,
                            async: false,
                            type: 'GET',
                            data: {payPwd: pay_password},
                            url: "user.php?act=account_safe&type=change_password&verify=pay_pwd",
                            success: function (res) {
                                var result = eval("("+res+")");
                                if (result.error)
                                {
                                    $("#pay_password_notice").removeClass().addClass("error");
                                    $("#pay_password_notice").html("<i></i>"+result.message);
                                    msg += result.message + '\n';
                                    
                                    return false;
                                }
                                else
                                {
                                    $("#pay_password_notice").removeClass().addClass("error");
                                    $("#pay_password_notice").html("<i></i>");
                                }
                            }
                        });  
                    }
                }
                // 验证码
                if(frm.elements['authCode'])
                {
                    if(authCode == '')
                    {
                        $("#code_notice").removeClass().addClass("error");
                        $("#code_notice").html("<i></i>"+json_languages.null_captcha_login);
                        msg += json_languages.null_captcha_login + '\n';
                    }
                    else
                    {
                        //验证验证码是否正确
                        $.ajax({
                            cache: false,
                            async: false,
                            type: 'GET',
                            data: {authCode: authCode},
                            url: "user.php?act=account_safe&type=change_password&verify=authcode",
                            success: function (res) {
                                var result = eval("("+res+")");
                                if (result.error)
                                {
                                    $("#code_notice").removeClass().addClass("error");
                                    $("#code_notice").html("<i></i>"+result.message);
                                    msg += result.message + '\n';
                                    
                                    return false;
                                }
                                else
                                {
                                    $("#code_notice").removeClass().addClass("error");
                                    $("#code_notice").html("<i></i>");
                                }
                            }
                        });  
                    }
                }
                // 修改密码 验证
                if(frm.elements['new_password'])
                {
                    // 判断两个密码是否相同
                    if (new_password.length==0 || re_new_password.length==0)
                    {
                        $("#new_password_error").removeClass().addClass("error");
                        $("#new_password_error").html("<i></i>"+json_languages.Real_name_password_null);
                        msg += json_languages.Real_name_password_null + '\n';
                    }
                    else
                    {
                        if (new_password != re_new_password)
                        {
                            $("#new_password_error").removeClass().addClass("error");
                            $("#new_password_error").html("<i></i>"+json_languages.Verify_password_deff);
                            msg += json_languages.Verify_password_deff + '\n';
                        }
                        else
                        {
                            $("#new_password_error").html("<i></i>");
                        }
                    }
                }
        
                // 实名认证模块
                var real_name  = frm.elements['real_name'] ? frm.elements['real_name'].value : ''; // 真实姓名
                var self_num  = frm.elements['self_num'] ? frm.elements['self_num'].value : ''; // 身份证号
                var bank_card  = frm.elements['bank_card'] ? frm.elements['bank_card'].value : ''; // 银行卡号
                var bank_name  = frm.elements['bank_name'] ? frm.elements['bank_name'].value : ''; // 银行卡号
                var mobile_phone  = frm.elements['mobile_phone'] ? frm.elements['mobile_phone'].value : ''; // 银行卡号
                var front_of_id_card  = frm.elements['front_of_id_card'] ? frm.elements['front_of_id_card'].value : ''; // 身份证正面
                var reverse_of_id_card  = frm.elements['reverse_of_id_card'] ? frm.elements['reverse_of_id_card'].value : ''; // 身份证反面
                
                if(frm.elements['real_name'])
                {
                    if(real_name == '')
                    {
                        $("#real_name_notice").removeClass().addClass("error");
                        $("#real_name_notice").html("<i></i>"+json_languages.Real_name_null);
                        msg += json_languages.Real_name_null + '\n';
                    }
                    else
                    {
                        var regName =/^[\u4e00-\u9fa5]{2,4}$/;
                         if(!regName.test(real_name)){
                            $("#real_name_notice").html("<i></i>"+"请正确填写真实姓名");
                         }else{
                            $("#real_name_notice").html("<i></i>");
                        }
                    }
                }
                if(frm.elements['self_num'])
                {
                    if(self_num == '')
                    {
                        $("#self_num_notice").removeClass().addClass("error");
                        $("#self_num_notice").html("<i></i>"+json_languages.number_ID_null);
                        msg += json_languages.number_ID_null + '\n';
                    }
                    else
                    {
                        var b = /(^\d{15}$)|(^\d{18}$)|(^\d{17}(\d|X|x)$)/;
                        if (!b.test(self_num)){
                            $("#self_num_notice").removeClass().addClass("error");
                            $("#self_num_notice").html("<i></i>"+json_languages.number_ID_error);
                            msg += json_languages.number_ID_error + '\n';
                        }else{
                            $("#self_num_notice").html("<i></i>");
                        }
                    }
                }
                if(frm.elements['bank_name'])
                {
                    if(bank_card == '')
                    {
                        $("#bank_name_notice").removeClass().addClass("error");
                        $("#bank_name_notice").html("<i></i>"+json_languages.bank_name_null);
                        msg += json_languages.bank_name_null + '\n';
                    }
                    else
                    {
                        $("#bank_name_notice").html("<i></i>");
                    }
                }
                if(frm.elements['bank_card'])
                {
                    if(bank_card == '')
                    {
                        $("#bank_card_notice").removeClass().addClass("error");
                        $("#bank_card_notice").html("<i></i>"+json_languages.bank_number_null);
                        msg += json_languages.bank_number_null + '\n';
                    }
                    else
                    {
                        if(isNaN(bank_card.replace(/\s+/g, ""))){
                            $("#bank_card_notice").removeClass().addClass("error");
                            $("#bank_card_notice").html("<i></i>"+json_languages.bank_number_error);
                            msg += json_languages.bank_number_error + '\n';
                        }else{
                            $("#bank_card_notice").html("<i></i>");
                        }
                    }
                }
                if(frm.elements['mobile_phone'])
                {
                    if(mobile_phone)
                    {
                       var reg = /^1[0-9]{10}$/;
                        if (!reg.test(mobile_phone)){
                            $("#phone_notice").removeClass().addClass("error");
                            $("#phone_notice").html("<i></i>"+json_languages.phone_format_error);
                            msg += json_languages.phone_format_error + '\n';
                        }else{
                            $("#phone_notice").html("<i></i>");
                        }
                    }
                }
                if(frm.elements['front_of_id_card'])
                {
                    if(front_of_id_card == '')
                    {
                        $("#front_pic").removeClass().addClass("error");
                        $("#front_pic").html("<i></i>"+json_languages.front_pic_null);
                        msg += json_languages.front_pic_null + '\n';
                    }
                }
                if(frm.elements['reverse_of_id_card'])
                {
                    if(front_of_id_card == '')
                    {
                        $("#reverse_pic").removeClass().addClass("error");
                        $("#reverse_pic").html("<i></i>"+json_languages.reverse_pic_null);
                        msg += json_languages.reverse_pic_null + '\n';
                    }
                }
                //alert(msg)
                if (msg.length > 0)
                {
                    return false;
                }
                else
                {
                    return true;
                }
            }
        </script>
        <?php endif; ?>
        
        
        
        <?php if ($this->_var['action'] == 'order_list' || $this->_var['action'] == 'order_recycle'): ?>
        <div class="user-mod">
            <div class="user-title">
                <h2>我的订单</h2>
                <ul class="tabs">
                    <li <?php if ($this->_var['order_type'] != toBe_confirmed && $this->_var['order_type'] != toBe_pay && $this->_var['order_type'] != toBe_confirmed && $this->_var['order_type'] != toBe_finished): ?>class="active"<?php endif; ?>><a href="user.php?act=order_list">全部订单(<?php echo $this->_var['allorders']; ?>)</a></li>
                    <li class="user-count3 <?php if ($this->_var['order_type'] == to_unconfirmed): ?>active<?php endif; ?>" onclick="get_OrderSearch('to_unconfirmed', '<?php echo $this->_var['action']; ?>', 'toBe_unconfirmed','','.user-count3')">
                    <a href="javascript:void(0);"><?php echo $this->_var['lang']['cs']['0']; ?>(<?php echo $this->_var['unconfirmed']; ?>)</a>
                    <input name="to_unconfirmed" id="to_unconfirmed" type="hidden" value="0" />
                    </li>
                    <li class="user-count1 <?php if ($this->_var['order_type'] == toBe_pay): ?>active<?php endif; ?>" onclick="get_OrderSearch('payId', '<?php echo $this->_var['action']; ?>', 'toBe_pay','','.user-count1')">
                    <a href="javascript:void(0);"><?php echo $this->_var['lang']['cs']['100']; ?>(<?php echo $this->_var['pay_count']; ?>)</a>
                    <input name="toBe_pay" id="payId" type="hidden" value="100" />
                    </li>
                    <li class="user-count2 <?php if ($this->_var['order_type'] == toBe_confirmed): ?>active<?php endif; ?>" onclick="get_OrderSearch('to_confirm_order', '<?php echo $this->_var['action']; ?>', 'toBe_confirmed','','.user-count2')">
                    <a href="javascript:void(0);">待收货(<?php echo $this->_var['to_confirm_order']; ?>)</a>
                    <input name="to_confirm_order" id="to_confirm_order" type="hidden" value="103" />
                    </li>
                    <li class="user-count4 <?php if ($this->_var['order_type'] == toBe_finished): ?>active<?php endif; ?>" onclick="get_OrderSearch('to_finished', '<?php echo $this->_var['action']; ?>', 'toBe_finished','','.user-count4')">
                    <a href="javascript:void(0);"><?php echo $this->_var['lang']['cs']['102']; ?>(<?php echo $this->_var['to_finished']; ?>)</a>
                    <input name="to_finished" id="to_finished" type="hidden" value="102" />
                    </li>
                </ul>
                <?php if ($this->_var['action'] == 'order_list'): ?>
                <a href="user.php?act=order_recycle" class="more"><?php echo $this->_var['lang']['Order_recycling_station']; ?></a>
                <?php else: ?>
                <a href="user.php?act=order_list" class="more"><?php echo $this->_var['lang']['order_list']; ?></a>
                <?php endif; ?>
            </div>
            <div class="user-list-title clearfix">
                <div class="user-list-filter">
                    <div id="order_status" class="imitate_select w120 mr10">
                        <div class="cite"><span><?php echo $this->_var['lang']['all_status']; ?></span><i class="iconfont icon-down"></i></div>
                        <ul>
                            <li id="order_status_-1"><a href="javascript:void(0);" data-idtxt="status_list" data-action="<?php echo $this->_var['action']; ?>" data-type="order_status" data-id="-1" data-value='-1'><?php echo $this->_var['lang']['all_status']; ?></a></li>
                            <?php $_from = $this->_var['status_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('key', 'list');if (count($_from)):
    foreach ($_from AS $this->_var['key'] => $this->_var['list']):
?>
                            <li id="order_status_<?php echo $this->_var['key']; ?>"><a href="javascript:void(0);" data-idtxt="status_list" data-action="<?php echo $this->_var['action']; ?>" data-type="order_status" data-id="<?php echo $this->_var['key']; ?>" data-value='<?php echo $this->_var['key']; ?>'><?php echo $this->_var['list']; ?></a></li>
                            <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
                        </ul>
                        <input name="order_status_list" type="hidden" value="-1" id="order_status_val">
                    </div>
                    <div id="dateTime" class="imitate_select w120">
                        <div class="cite"><span><?php echo $this->_var['lang']['all_time']; ?></span><i class="iconfont icon-down"></i></div>
                        <ul>
                            <li id="time_allDate"><a href="javascript:void(0);" data-idtxt="submitDate" data-action="<?php echo $this->_var['action']; ?>" data-type="dateTime" data-id="allDate" data-value="allDate"><?php echo $this->_var['lang']['all_time']; ?></a></li>
                            <li id="time_today"><a href="javascript:void(0);" data-idtxt="submitDate" data-action="<?php echo $this->_var['action']; ?>" data-type="dateTime" data-id="today" data-value="today"><?php echo $this->_var['lang']['Today']; ?></a></li>
                            <li id="time_three_today"><a href="javascript:void(0);" data-idtxt="submitDate" data-action="<?php echo $this->_var['action']; ?>" data-type="dateTime" data-id="three_today" data-value="three_today"><?php echo $this->_var['lang']['three_today']; ?></a></li>
                            <li id="time_aweek"><a href="javascript:void(0);" data-idtxt="submitDate" data-action="<?php echo $this->_var['action']; ?>" data-type="dateTime" data-id="aweek" data-value="aweek"><?php echo $this->_var['lang']['aweek']; ?></a></li>
                            <li id="time_thismonth"><a href="javascript:void(0);" data-idtxt="submitDate" data-action="<?php echo $this->_var['action']; ?>" data-type="dateTime" data-id="thismonth" data-value="thismonth"><?php echo $this->_var['lang']['thismonth']; ?></a></li>
                        </ul>
                        <input name="order_submitDate" type="hidden" value="allDate" id="dateTime_val">
                    </div>
                </div>
                <form class="user-list-search">
                    <input type="text" id="ip_keyword" class="text" onkeydown="javascript:if(event.keyCode==13) OrderSearch('ip_keyword');" onblur="if (this.value=='') this.value=this.defaultValue; this.style.color='#999'" onfocus="if (this.value==this.defaultValue)this.value='';this.style.color='#666'" placeholder="<?php echo $this->_var['lang']['search_oreder_user']; ?>" name="" style="color:#999;"/>
                    <button type="button" onclick="get_OrderSearch('ip_keyword', '<?php echo $this->_var['action']; ?>', 'text')"><i class="iconfont icon-search"></i></button>
                </form>
            </div>
            <div id="user_order_list">
            <?php if (! $this->_var['order_type']): ?>
            <?php echo $this->fetch('library/user_order_list.lbi'); ?>
            <?php endif; ?>
            </div>
        </div>
        <?php endif; ?> 
        

        
        <?php if ($this->_var['action'] == 'order_detail' || $this->_var['action'] == 'auction_order_detail'): ?>
        <div class="user-mod user-order-detail">
            <div class="user-title">
                <h2>订单详情</h2>
                <a href="user.php?act=message_list&order_id=<?php echo $this->_var['order']['order_id']; ?>" class="more"><?php echo $this->_var['lang']['type']['0']; ?><em>&nbsp;&nbsp;(&nbsp;<?php echo $this->_var['feedback_num']; ?>&nbsp;)</em></a>
            </div>
            <div class="order-detail-statu">
                <div class="statu-left">
                    <p><?php echo $this->_var['order']['pay_status_desc']; ?><?php echo $this->_var['lang']['your_order']; ?> <span style="color: deepskyblue;"><?php if ($this->_var['is_baitiao']): ?><?php if ($this->_var['stages_info']['is_stages']): ?>【<?php echo $this->_var['lang']['Ious_staging']; ?>】<?php else: ?>【<?php echo $this->_var['lang']['baitiao_order']; ?>】<?php endif; ?><?php endif; ?></span></p>
                    <p><?php echo $this->_var['lang']['order_number']; ?>：<?php echo $this->_var['order']['order_sn']; ?>
                    <?php if ($this->_var['order']['extension_code'] == "group_buy"): ?>
                        <a href="./group_buy.php?act=view&id=<?php echo $this->_var['order']['extension_id']; ?>" class="f6"><strong><?php echo $this->_var['lang']['order_is_group_buy']; ?></strong></a>
                    <?php elseif ($this->_var['order']['extension_code'] == "exchange_goods"): ?>
                        <a href="./exchange.php?act=view&id=<?php echo $this->_var['order']['extension_id']; ?>" class="f6"><strong><?php echo $this->_var['lang']['order_is_exchange']; ?></strong></a>
                    <?php elseif ($this->_var['order']['extension_code'] == "presale"): ?>
                        <a href="./presale.php?act=view&id=<?php echo $this->_var['order']['extension_id']; ?>" class="f6"><strong><?php echo $this->_var['lang']['order_is_presale']; ?></strong></a>
                    <?php endif; ?>  
                    </p>
                </div>
            </div>
            
            <ul class="order-detail-progress progress-<?php echo $this->_var['order']['order_tracking']; ?>">
                <li><?php echo $this->_var['lang']['order_addtime']; ?><div class="tip"><?php echo $this->_var['order']['add_time']; ?></div></li>
                <li>付款<div class="tip"><?php echo $this->_var['order']['pay_time']; ?></div></li>
                <li>发货<div class="tip"><?php echo $this->_var['order']['shipping_time']; ?></div></li>
                <li>收货<div class="tip"><?php echo $this->_var['order']['confirm_take_time']; ?></div></li>
                <li>完成<div class="tip"></div></li>
            </ul>
            <div class="user-info-list">
                <div class="info-title"><h2><?php echo $this->_var['lang']['consignee_info']; ?></h2></div>
                <div class="info-content">
                    <div class="info-item">
                        <div class="item-label"><?php echo $this->_var['lang']['consignee']; ?>：</div>
                        <div class="item-value"><?php echo $this->_var['order']['consignee']; ?></div>
                    </div>
                    <div class="info-item">
                        <div class="item-label"><?php echo $this->_var['lang']['label_mobile']; ?>：</div>
                        <div class="item-value"><?php echo $this->_var['order']['mobile']; ?></div>
                    </div>
                    <div class="info-item">
                        <div class="item-label"><?php echo $this->_var['lang']['label_address']; ?>：</div>
                        <div class="item-value"><?php echo $this->_var['order']['region']; ?>&nbsp;<?php echo $this->_var['order']['address']; ?></div>
                    </div>
                </div>
            </div>
            
            <?php if ($this->_var['order']['store_id']): ?>
            <div class="user-info-list">
                <div class="info-title"><h2>门店信息</h2></div>
                <div class="info-content">
                    
                    <?php if ($this->_var['order']['pick_code'] && $this->_var['order']['pay_status'] == 2): ?>
                    <div class="info-item">
                        <div class="item-label"><?php echo $this->_var['lang']['pick_code']; ?>：</div>
                        <div class="item-value red"><?php echo $this->_var['order']['pick_code']; ?></div>
                    </div>
                    <div class="info-item">
                        <div class="item-label"><?php echo $this->_var['lang']['tpnd_time']; ?>：</div>
                        <div class="item-value"><?php echo $this->_var['order']['take_time']; ?></div>
                    </div>
                    <?php endif; ?>
                    
                    <?php if ($this->_var['offline_store']): ?>
                    <div class="info-item">
                        <div class="item-label"><?php echo $this->_var['lang']['stores_name']; ?>：</div>
                        <div class="item-value"><?php echo $this->_var['offline_store']['stores_name']; ?></div>
                    </div>
                    <div class="info-item">
                        <div class="item-label"><?php echo $this->_var['lang']['contact_phone']; ?>：</div>
                        <div class="item-value"><?php echo $this->_var['offline_store']['stores_tel']; ?></div>
                    </div>
                    <div class="info-item">
                        <div class="item-label"><?php echo $this->_var['lang']['user_address']; ?>：</div>
                        <div class="item-value"><?php echo $this->_var['offline_store']['province']; ?>&nbsp;<?php echo $this->_var['offline_store']['city']; ?>&nbsp;<?php echo $this->_var['offline_store']['district']; ?>&nbsp;<?php echo $this->_var['offline_store']['stores_address']; ?></div>
                    </div>
                    <div class="info-item">
                        <div class="item-label"><?php echo $this->_var['lang']['stores_opening_hours']; ?>：</div>
                        <div class="item-value"><?php echo $this->_var['offline_store']['stores_opening_hours']; ?></div>
                    </div>
                    <div class="info-item">
                        <div class="item-label"><?php echo $this->_var['lang']['stores_traffic_line']; ?>：</div>
                        <div class="item-value"><?php echo $this->_var['offline_store']['stores_traffic_line']; ?></div>
                    </div>
                    <?php if ($this->_var['offline_store']['stores_img']): ?>
                    <div class="info-item">
                        <div class="item-label"><?php echo $this->_var['lang']['stores_img']; ?>：</div>
                        <div class="item-value"><a href="<?php echo $this->_var['offline_store']['stores_img']; ?>" class="nyroModal ftx-05">查看图片</a></div>
                    </div>
                    <?php endif; ?>
                    <?php endif; ?>
                </div>
            </div>
            <?php endif; ?>
            
            <?php if ($this->_var['order']['extension_code'] != 'wholesale'): ?>
            <div class="user-info-list">
                <div class="info-title"><h2>付款信息</h2></div>
                <div class="info-content">
                    <div class="info-item">
                        <div class="item-label"><?php echo $this->_var['lang']['payment_method']; ?>：</div>
                        <div class="item-value"><?php echo $this->_var['order']['pay_name']; ?></div>
                    </div>
                    
                    <?php if ($this->_var['is_presale']): ?>
                        <?php if ($this->_var['settle_status'] > 0): ?>
                            <?php if ($this->_var['is_onlinepay']): ?>
                                <?php if ($this->_var['payment_list']): ?>
                                <div class="info-item">
                                    <div class="item-label lh30">在线支付：</div>
                                    <div class="item-value">
                                        <form name="payment" method="post" action="user.php">
                                        <select name="pay_id">
                                          <?php $_from = $this->_var['payment_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'payment');if (count($_from)):
    foreach ($_from AS $this->_var['payment']):
?>
                                          <option value="<?php echo $this->_var['payment']['pay_id']; ?>">
                                          <?php echo $this->_var['payment']['pay_name']; ?>(<?php echo $this->_var['lang']['pay_fee']; ?>:<?php echo $this->_var['payment']['format_pay_fee']; ?>)
                                          </option>
                                          <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
                                        </select>
                                        <input type="hidden" name="act" value="act_edit_payment" />
                                        <input type="hidden" name="order_id" value="<?php echo $this->_var['order']['order_id']; ?>" />
                                        <input type="submit" name="Submit" class="submit" value="<?php echo $this->_var['lang']['button_submit']; ?>" />
                                        </form>
                                    </div>
                                 </div>
                                <?php endif; ?> 
                                
                                <?php if ($this->_var['allow_edit_surplus']): ?>
                                <div class="info-item"> 
                                    <div class="item-label lh30"><?php echo $this->_var['lang']['use_surplus']; ?>：</div>
                                    <div class="item-value">
                                    <form action="user.php" method="post" name="formFee" id="formFee" class="formfee" onsubmit="return paymentForm(this)">
                                        <?php if ($this->_var['open_pay_password']): ?>
                                        <label><?php echo $this->_var['lang']['pay_password']; ?>：</label>
                                        <input type="password"   style="display:none"/>
                                        <input name="pay_pwd" id="pay_pwd_val" type="password" class="text text-2" size="20" />
                                        <?php endif; ?>
                                        <input name="surplus" id='ECS_SURPLUS' type="text" size="8" value="0" class="text text-4"/>
                                        <span><?php echo $this->_var['max_surplus']; ?></span>
                                        <input type="submit" name="Submit" class="submit" value="<?php echo $this->_var['lang']['button_submit']; ?>" class="btn sc-redBg-btn btn30" />
                                        <input type="hidden" name="act" value="act_edit_surplus" />
                                        <input type="hidden" name="pay_status" value="<?php echo $this->_var['order']['extension_code']; ?>" />
                                        <input type="hidden" name="order_id" value="<?php echo $_GET['order_id']; ?>" />
                                    </form>
                                    <script type="text/javascript">
                                    function paymentForm(frm){
                                        <?php if ($this->_var['open_pay_password']): ?>
                                        var pwd_erorr = 0;
                                        var pay_pwd = $("#pay_pwd_val").val();
                                        $.ajax({
                                            type:"post",
                                            url:"user.php?act=pay_pwd",
                                            data:'pay_pwd=' + pay_pwd,
                                            dataType: 'json',
                                            async : false, //设置为同步操作就可以给全局变量赋值成功
                                            success:function(result){
                                                pwd_erorr = result.error;
                                            }
                                        }); 
    
                                        if(pwd_erorr == 1 || pay_pwd == '' || pay_pwd == 0){
                                            pbDialog(json_languages.pay_password_packup_null,"",0);
                                            return false;
                                        }else if(pwd_erorr == 2){
                                            pbDialog(json_languages.pay_password_packup_error,"",0);
                                            return false;
                                        }
                                        <?php endif; ?>
                                        
                                        var surplus = $("#ECS_SURPLUS").val();
                                        if(surplus == '' || surplus == 0){
                                            pbDialog(json_languages.surplus_null,"",0);
                                            return false;
                                        }else{
                                            var t = surplus.charCodeAt(surplus);
                                            if (t>=48 && t <=57)
                                            {
                                                pbDialog(json_languages.surplus_isnumber,"",0);
                                                return false;
                                            }
                                        }
                                    }
                                    </script>
                                    </div>
                                </div>
                                <?php endif; ?>
                            <?php endif; ?>
                        <?php elseif ($this->_var['settle_status'] < 0): ?>
                        <div class="info-item">
                            <div class="item-label">支付提示：</div>
                            <div class="item-value"><?php echo $this->_var['lang']['end_pay_time']; ?>：<span class="ftx-01"><?php echo $this->_var['pay_end_time']; ?></span>！</div>
                        </div>                           
                        <?php endif; ?>
                        <div class="info-item">
                            <div class="item-label">支付提示：</div>
                            <div class="item-value"><?php echo $this->_var['lang']['pay_end_one']; ?><span style='color:red'><?php echo $this->_var['pay_start_time']; ?></span ><?php echo $this->_var['lang']['zhi']; ?><span style='color:red'><?php echo $this->_var['pay_end_time']; ?></span><?php echo $this->_var['lang']['pay_end_two']; ?></div>
                        </div>
                    <?php else: ?>
                        <?php if ($this->_var['is_onlinepay']): ?>
                            <?php if ($this->_var['payment_list']): ?>
                                <div class="info-item">
                                    <div class="item-label lh30">在线支付：</div>
                                    <div class="item-value">
                                        <form name="payment" method="post" action="user.php">
                                            <select name="pay_id" class="select">
                                              <?php $_from = $this->_var['payment_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'payment');if (count($_from)):
    foreach ($_from AS $this->_var['payment']):
?>
                                              <option value="<?php echo $this->_var['payment']['pay_id']; ?>">
                                              <?php echo $this->_var['payment']['pay_name']; ?>(<?php echo $this->_var['lang']['pay_fee']; ?>:<?php echo $this->_var['payment']['format_pay_fee']; ?>)
                                              </option>
                                              <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
                                            </select>
                                            <input type="hidden" name="act" value="act_edit_payment" />
                                            <input type="hidden" name="order_id" value="<?php echo $this->_var['order']['order_id']; ?>" />
                                            <input type="submit" name="Submit" class="btn sc-redBg-btn btn30 ml5" value="<?php echo $this->_var['lang']['button_submit']; ?>" />
                                        </form>
                                    </div>
                                </div>
                                <?php if ($this->_var['allow_edit_surplus']): ?>
                                <div class="info-item">
                                    <div class="item-label lh30"><?php echo $this->_var['lang']['use_surplus']; ?>：</div>
                                    <div class="item-value">
                                        <form action="user.php" method="post" name="formFee" id="formFee" class="formfee" onsubmit="return paymentForm(this)">
                                            <?php if ($this->_var['open_pay_password']): ?>
                                            <label><?php echo $this->_var['lang']['pay_password']; ?>：</label>
                                            <input type="password"   style="display:none"/>
                                            <input name="pay_pwd" id="pay_pwd_val" type="password" class="text text-2" size="20" />
                                            <?php endif; ?>
                                            <input name="surplus" id='ECS_SURPLUS' type="text" size="8" value="0" class="text text-4" />
                                            <span><?php echo $this->_var['max_surplus']; ?></span>
                                            <input type="submit" name="Submit" class="btn sc-redBg-btn btn30" value="<?php echo $this->_var['lang']['button_submit']; ?>" />
                                            <input type="hidden" name="act" value="act_edit_surplus" />
                                            <input type="hidden" name="pay_status" value="<?php echo $this->_var['order']['extension_code']; ?>" />
                                            <input type="hidden" name="order_id" value="<?php echo $_GET['order_id']; ?>" />
                                        </form>
                                    </div>    
                                    <script type="text/javascript">
                                    function paymentForm(frm){
                                        <?php if ($this->_var['open_pay_password']): ?>
                                        var pwd_erorr = 0;
                                        var pay_pwd = $("#pay_pwd_val").val();
                                        $.ajax({
                                            type:"post",
                                            url:"user.php?act=pay_pwd",
                                            data:'pay_pwd=' + pay_pwd,
                                            dataType: 'json',
                                            async : false, //设置为同步操作就可以给全局变量赋值成功
                                            success:function(result){
                                                pwd_erorr = result.error;
                                            }
                                        }); 
    
                                        if(pwd_erorr == 1 || pay_pwd == '' || pay_pwd == 0){
                                            pbDialog(json_languages.pay_password_packup_null,"",0);
                                            return false;
                                        }else if(pwd_erorr == 2){
                                            pbDialog(json_languages.pay_password_packup_error,"",0);
                                            return false;
                                        }
                                        <?php endif; ?>
                                        
                                        var surplus = $("#ECS_SURPLUS").val();
                                        if(surplus == '' || surplus == 0){
                                            pbDialog(json_languages.surplus_null,"",0);
                                            return false;
                                        }else{
                                            var t = surplus.charCodeAt(surplus);
                                            if (t>=48 && t <=57)
                                            {
                                                pbDialog(json_languages.surplus_isnumber,"",0);
                                                return false;
                                            }
                                        }
                                    }
                                    </script>
                                </div>
                                <?php endif; ?>
                            <?php endif; ?>
                        <?php endif; ?>
                    <?php endif; ?>
                    
                    <div class="info-item">
                        <div class="item-label"><?php echo $this->_var['lang']['detail_pay_status']; ?>：</div>
                        <div class="item-value">
                            <?php echo $this->_var['order']['pay_status_desc']; ?><?php if ($this->_var['order']['order_amount'] > 0 && $this->_var['order']['pay_online']): ?>
                            <div class="or-btn"><?php echo $this->_var['order']['pay_online']; ?></div>
                            <?php else: ?>
                                
                                <?php if ($this->_var['order']['pay_code'] == 'chunsejinrong' && $this->_var['order']['pay_status'] == 0): ?>
                                    <div class="or-btn">
                                        <div class="alipay" style="text-align:center">
                                        <input onclick="get_user_chunsejinrong();" value="<?php echo $this->_var['lang']['ious_pay']; ?>" type="button">
                                        </div>
                                    </div>
                                    <script type="text/javascript">
                                        function get_user_chunsejinrong(){
                                            location.href = "flow.php?step=done&act=chunsejinrong&order_sn=<?php echo $this->_var['order']['order_sn']; ?>";
                                        }
                                    </script>
                                <?php endif; ?>
                                
                            <?php endif; ?>
                        </div>
                    </div>
                    <?php if ($this->_var['order']['pay_time']): ?>
                    <div class="info-item">
                        <div class="item-label">付款时间：</div>
                        <div class="item-value"><?php echo $this->_var['order']['pay_time']; ?></div>
                    </div>
                    <?php endif; ?>
                </div>
            </div>
            <?php endif; ?>
            <div class="user-info-list">
                <div class="info-title"><h2>配送信息</h2></div>
                <div class="info-content">
                    <div class="info-item">
                        <div class="item-label"><?php echo $this->_var['lang']['shipping']; ?>：</div>
                        <div class="item-value" id="shipping_name_<?php echo $this->_var['order']['order_id']; ?>"><?php echo $this->_var['order']['shipping_name']; ?></div>
                    </div>
                    <?php if ($this->_var['order']['invoice_no']): ?>
                    <div class="info-item">
                        <div class="item-label"><?php echo $this->_var['lang']['Waybill_number']; ?>：</div>
                        <div class="item-value" id="invoice_no_<?php echo $this->_var['order']['order_id']; ?>">
							<ul ectype="invoice_no_list">
								<?php $_from = $this->_var['order']['invoice_no_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'invoice_no_item');if (count($_from)):
    foreach ($_from AS $this->_var['invoice_no_item']):
?>
								<li data-invoice_no="<?php echo $this->_var['invoice_no_item']; ?>">
									<span><?php echo $this->_var['invoice_no_item']; ?></span>
									<?php if ($this->_var['order']['invoice_no_count'] > 1): ?><a href="javascript:view_logistics_info('<?php echo $this->_var['order']['order_id']; ?>', '<?php echo $this->_var['invoice_no_item']; ?>');" class="ml10">查看物流</a><?php endif; ?>
								</li>
								<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
							</ul>
						</div>
                    </div>
                    <?php endif; ?>
                    <div class="info-item">
                        <div class="item-label"><?php echo $this->_var['lang']['detail_shipping_status']; ?>：</div>
                        <div class="item-value"><?php echo $this->_var['order']['shipping_status']; ?></div>
                    </div>
                    <?php if ($this->_var['order']['shipping_time']): ?>
                    <div class="info-item">
                        <div class="item-label"><?php echo $this->_var['lang']['shipping_date']; ?>：</div>
                        <div class="item-value"><?php echo $this->_var['order']['shipping_time']; ?></div>
                    </div>
                    <?php endif; ?>
                    <?php if ($this->_var['order']['best_time']): ?>
                    <div class="info-item">
                        <div class="item-label">送货时间：</div>
                        <div class="item-value"><?php echo $this->_var['order']['best_time']; ?></div>
                    </div>
                    <?php endif; ?>
                </div>
            </div>
            <?php if ($this->_var['order']['invoice_no']): ?>
            <div class="user-info-list">
                <div class="info-title"><h2>物流跟踪</h2></div>
                <div class="info-content">
                    <div class="logistics-items" id="retData_<?php echo $this->_var['order']['order_id']; ?>"></div>
                </div>
            </div>
            
            <script type="text/javascript">
                $(function(){
                    var expressid = $("#shipping_name_" + <?php echo $this->_var['order']['order_id']; ?>).html();
                    //var expressno = $("#invoice_no_" + <?php echo $this->_var['order']['order_id']; ?>).html();
                    var expressno = $("[ectype='invoice_no_list']").find("li:first").data("invoice_no");
                
                    $("#retData_" + <?php echo $this->_var['order']['order_id']; ?>).html("<center>"+json_languages.logistics_tracking_in+"</center>");
                    
                    $.ajax({
                        url: "plugins/kuaidi/express.php",
                        type: "post",
                        data:'com=' + expressid + '&nu=' + expressno,
                        success: function(data,textStatus){
                            $("#retData_" + <?php echo $this->_var['order']['order_id']; ?>).html(data);
                        },
                         error: function(o){
                        }
                    });
                });

				//查看物流
				function view_logistics_info(order_id, invoice_no){
					$.jqueryAjax('get_ajax_content.php', 'act=view_logistics_info&order_id='+order_id+'&invoice_no='+invoice_no, function(result){
						pb({
							id:'logistics_info_dialog',
							title:'查询物流',
							width:500,
							height:60,
							content:'',
							drag:false,
							foot:false,
						});	
						//插入物流信息
						$.ajax({
							url: "plugins/kuaidi/express.php",
							type: "post",
							data:'com=' + result.expressid + '&nu=' + result.expressno,
							success: function(data,textStatus){
								$("#logistics_info_dialog .pb-ct").html(data);
							},
							 error: function(o){
							}
						});						
					})
				}
            </script>
            <?php endif; ?>
            <div class="user-info-list">
                <div class="info-title"><h2><?php echo $this->_var['lang']['Invoice_information']; ?></h2></div>
				<?php if ($this->_var['order']['invoice_type'] == 0): ?>
                <div class="info-content">
                    <div class="info-item">
                        <div class="item-label">发票类型：</div>
                        <div class="item-value"><?php echo $this->_var['lang']['need_invoice'][$this->_var['order']['invoice_type']]; ?></div>
                    </div>
                    <div class="info-item">
                        <div class="item-label"><?php echo $this->_var['lang']['invoice_content']; ?>：</div>
                        <div class="item-value"><?php echo $this->_var['order']['inv_content']; ?></div>
                    </div>
                    <div class="info-item">
                        <div class="item-label"><?php echo $this->_var['lang']['invoice_title']; ?>：</div>
                        <div class="item-value"><?php echo $this->_var['order']['inv_payee']; ?></div>
                    </div>
					<?php if ($this->_var['order']['tax_id']): ?>
					<div class="info-item">
                        <div class="item-label">识别号：</div>
                        <div class="item-value"><?php echo $this->_var['order']['tax_id']; ?></div>
                    </div>
					<?php endif; ?>
                </div>
				<?php else: ?>
				<div class="info-content">
                    <div class="info-item">
                        <div class="item-label">发票类型：</div>
                        <div class="item-value"><?php echo $this->_var['lang']['need_invoice'][$this->_var['order']['invoice_type']]; ?></div>
                    </div>
					<div class="info-item">
                        <div class="item-label">审核状态：</div>
                        <div class="item-value">
							<?php if ($this->_var['vat_info']['audit_status'] == 0): ?>
								未审核
							<?php elseif ($this->_var['vat_info']['audit_status'] == 1): ?>
								审核通过
							<?php elseif ($this->_var['vat_info']['audit_status'] == 2): ?>
								审核未通过
							<?php endif; ?>
						</div>
                    </div>
                    <div class="info-item">
                        <div class="item-label">单位名称：</div>
                        <div class="item-value"><?php echo $this->_var['vat_info']['company_name']; ?></div>
                    </div>
                    <div class="info-item">
                        <div class="item-label">识别码：</div>
                        <div class="item-value"><?php echo $this->_var['vat_info']['tax_id']; ?></div>
                    </div>
                </div>
				<?php endif; ?>
            </div>
            <?php if ($this->_var['order']['postscript']): ?>
             <div class="user-info-list">
                <div class="info-title"><h2><?php echo $this->_var['lang']['Order_note_user']; ?></h2></div>
                <div class="info-content">
                    <div class="info-item">
                        <div class="item-label"><?php echo $this->_var['lang']['Order_note_user']; ?>：</div>
                        <div class="item-value"><?php echo $this->_var['order']['postscript']; ?></div>
                    </div>
                </div>
            </div>
            <?php endif; ?>
            <div class="pt10 pb10">
                <a href="<?php echo $this->_var['order']['shop_url']; ?>" class="user-shop-link"><?php echo $this->_var['order']['shop_name']; ?></a>
                <?php if ($this->_var['order']['is_IM'] == 1 || $this->_var['order']['is_dsc']): ?>
                <a id="IM" onclick="openWin(this)" href="javascript:;" goods_id="<?php echo $this->_var['goods']['goods_id']; ?>"  class="iconfont icon-kefu user-shop-kefu"></a>
                <?php else: ?>
                <?php if ($this->_var['order']['kf_type'] == 1): ?>
                <a href="http://www.taobao.com/webww/ww.php?ver=3&touid=<?php echo $this->_var['order']['kf_ww']; ?>&siteid=cntaobao&status=1&charset=utf-8" class="iconfont icon-kefu user-shop-kefu" target="_blank"></a>
                <?php else: ?>
                <a href="http://wpa.qq.com/msgrd?v=3&uin=<?php echo $this->_var['order']['kf_qq']; ?>&site=qq&menu=yes" class="iconfont icon-kefu user-shop-kefu" target="_blank"></a>
                <?php endif; ?>
                <?php endif; ?>
                <?php if ($this->_var['order']['return_url']): ?><a href="<?php echo $this->_var['order']['return_url']; ?>" class="more">申请售后</a><?php endif; ?>
            </div>
            <?php if ($this->_var['order']['is_zc_order'] == 1): ?>
            <table class="user-table user-table-detail-goods">
                <colgroup>
                    <col width="320">
                    <col width="110">
                    <col width="120">
                    <col width="95">
                    <col width="90">
                    <col>
                    <col>
                </colgroup>
                <thead>
                    <tr>
                        <th><?php echo $this->_var['lang']['zc_project_name']; ?></th>
                        <th class="tl"><?php echo $this->_var['lang']['start_time']; ?></th>
                        <th class="tl"><?php echo $this->_var['lang']['end_time']; ?></th>
                        <th class="tl"><?php echo $this->_var['lang']['zc_project_raise_money']; ?></th>
                        <th class="tl"><?php echo $this->_var['lang']['zc_goods_price']; ?></th>
                        <th class="tl"><?php echo $this->_var['lang']['freight']; ?></th>
                        <th><?php echo $this->_var['lang']['ws_subtotal']; ?></th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>
                            <div class="product-item first">
                                <div class="p-img fl"><a href="crowdfunding.php?act=detail&id=<?php echo $this->_var['zc_goods_info']['pid']; ?>" target="_blank"><img src="<?php echo $this->_var['zc_goods_info']['title_img']; ?>" width="55" height="55"></a></div>                                                                 
                                <div class="p-name fl ml10">
                                <a href="crowdfunding.php?act=detail&id=<?php echo $this->_var['zc_goods_info']['pid']; ?>" class="ftx-07" target="_blank"><?php echo $this->_var['zc_goods_info']['title']; ?></a>
                                </div>
                            </div> 							
                        </td>
                        <td><?php echo $this->_var['zc_goods_info']['start_time']; ?></td>
                        <td><?php echo $this->_var['zc_goods_info']['end_time']; ?></td>
                        <td><?php echo $this->_var['zc_goods_info']['formated_amount']; ?></td>
                        <td><?php echo $this->_var['zc_goods_info']['formated_price']; ?></td>
                        <td><?php echo $this->_var['zc_goods_info']['formated_shipping_fee']; ?></td>
                        <td><?php echo $this->_var['zc_goods_info']['formated_price']; ?></td>
                    </tr>
                </tbody>
            </table>
            <?php else: ?>
            <table class="user-table user-table-detail-goods">
                <colgroup>
                    <col width="320">
                    <col width="110">
                    <col width="120">
                    <col width="95">
                    <col width="90">
                    <col>
                </colgroup>
                <thead>
                    <tr>
                        <th><?php echo $this->_var['lang']['goods']; ?></th>
                        <th class="tl"><?php echo $this->_var['lang']['goods_attr']; ?></th>
                        <th class="tl"><?php echo $this->_var['lang']['user_goods_sn']; ?></th>
                        <th class="tl"><?php echo $this->_var['lang']['delivery_warehouse']; ?></th>
                        <th class="tl"><?php echo $this->_var['lang']['unit_price_user']; ?></th>
                        <th><?php echo $this->_var['lang']['ws_subtotal']; ?></th>
                    </tr>
                </thead>
                <tbody>
                <?php $_from = $this->_var['goods_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'goods');if (count($_from)):
    foreach ($_from AS $this->_var['goods']):
?>
                    <tr>
                        <td>
                        <?php if ($this->_var['goods']['goods_id'] > 0 && $this->_var['goods']['extension_code'] != 'package_buy'): ?>
                            <a href="<?php echo $this->_var['goods']['url']; ?>" class="img"><img src="<?php echo $this->_var['goods']['goods_thumb']; ?>" alt=""></a>
                        <?php endif; ?>
                        <?php if ($this->_var['goods']['goods_id'] > 0 && $this->_var['goods']['extension_code'] != 'package_buy'): ?>							
                            <a href="<?php echo $this->_var['goods']['url']; ?>" class="name"<?php if ($this->_var['goods']['is_real'] == 0 && $this->_var['goods']['virtual_info']): ?> style="margin-top:7px;"<?php endif; ?>><?php echo $this->_var['goods']['goods_name']; ?></a>
                            <?php if ($this->_var['goods']['parent_id'] > 0): ?>
                            <p class="ftx-01">（<?php echo $this->_var['lang']['accessories']; ?>）</p>
                            <?php elseif ($this->_var['goods']['is_gift']): ?>
                            <p class="ftx-01">（<?php echo $this->_var['lang']['largess']; ?>）</p>
                            <?php endif; ?>
                        <?php elseif ($this->_var['goods']['goods_id'] > 0 && $this->_var['goods']['extension_code'] == 'package_buy'): ?>
                        <a href="javascript:void(0)" onclick="setSuitShow(<?php echo $this->_var['goods']['goods_id']; ?>)" class="name"<?php if ($this->_var['goods']['is_real'] == 0 && $this->_var['goods']['virtual_info']): ?> style="margin-top:7px;"<?php endif; ?>><?php echo $this->_var['goods']['goods_name']; ?><span style="color:#FF0000;"><?php echo $this->_var['lang']['remark_package']; ?></span></a>
                            <div class="suit" id="suit_<?php echo $this->_var['goods']['goods_id']; ?>">
                                <?php $_from = $this->_var['goods']['package_goods_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'package_goods_list');if (count($_from)):
    foreach ($_from AS $this->_var['package_goods_list']):
?>
                                  <a href="goods.php?id=<?php echo $this->_var['package_goods_list']['goods_id']; ?>" target="_blank">
                                    <img src="<?php echo $this->_var['package_goods_list']['goods_thumb']; ?>" />
                                  </a>
                                <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
                            </div>
                        <?php endif; ?> 
                            <?php if ($this->_var['goods']['is_real'] == 0 && $this->_var['goods']['virtual_info']): ?>
                            <div id="virtual_div_<?php echo $this->_var['goods']['goods_id']; ?>" class="virtual_div">
                                <div id="show_virtual_info_<?php echo $this->_var['goods']['goods_id']; ?>" class="virtual_title"><?php echo $this->_var['lang']['virtual_goods_info']; ?></div>
                                <div id="virtual_info_<?php echo $this->_var['goods']['goods_id']; ?>" class="virtual_info">
                                    <div class="v_arrow"><em></em><span></span></div>
                                    <p><?php echo $this->_var['lang']['card_sn']; ?>：<?php echo $this->_var['goods']['virtual_info']['card_sn']; ?></p>
                                    <p><?php echo $this->_var['lang']['card_password']; ?>：<?php echo $this->_var['goods']['virtual_info']['card_password']; ?></p>
                                    <p><?php echo $this->_var['lang']['end_date']; ?>：<?php echo $this->_var['goods']['virtual_info']['end_date']; ?></p>
                                </div>
                            </div>                                      
                            <?php endif; ?> 
                        </td>
                        <td><?php echo nl2br($this->_var['goods']['goods_attr']); ?></td>
                        <td><?php echo $this->_var['goods']['goods_sn']; ?></td>
                        <td><?php echo $this->_var['goods']['warehouse_name']; ?></td>
                        <td><p><?php echo $this->_var['goods']['goods_price']; ?></p><p>×<?php echo $this->_var['goods']['goods_number']; ?></p></td>
                        <td>
                            <p class="ftx-01"><?php echo $this->_var['goods']['subtotal']; ?></p>
                            <?php if ($this->_var['goods']['dis_amount'] > 0): ?>
                            <p class="ftx-05">(<?php echo $this->_var['lang']['Discount_user']; ?>：<?php echo $this->_var['goods']['discount_amount']; ?>)</p>
                            <?php endif; ?>
                        </td>
                    </tr>
                <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
                </tbody>
            </table>
            <?php endif; ?>
            <div class="user-order-detail-total">
                <?php if ($this->_var['goods_list_count'] > 0): ?>
                <dl class="total-row">
                    <dt class="total-label">商品件数：</dt>
                    <dd class="total-value"><?php echo $this->_var['goods_list_count']; ?><?php echo $this->_var['lang']['jian']; ?></dd>
                </dl>
                <?php endif; ?>
                <dl class="total-row">
                    <dt class="total-label"><?php echo $this->_var['lang']['shopping_money']; ?>：</dt>
                    <dd class="total-value"><?php if ($this->_var['order']['extension_code'] == "group_buy"): ?><?php echo $this->_var['lang']['gb_deposit']; ?><?php endif; ?><?php echo $this->_var['order']['formated_goods_amount']; ?></dd>
                </dl>
                <?php if ($this->_var['order']['discount'] > 0): ?>
                <dl class="total-row">
                    <dt class="total-label"><?php echo $this->_var['lang']['discount']; ?>：</dt>
                    <dd class="total-value">-  <?php echo $this->_var['order']['formated_discount']; ?></dd>
                </dl>
                <?php endif; ?>
                <?php if ($this->_var['order']['tax'] > 0): ?>
                <dl class="total-row">
                    <dt class="total-label"><?php echo $this->_var['lang']['tax']; ?>：</dt>
                    <dd class="total-value">+  <?php echo $this->_var['order']['formated_tax']; ?></dd>
                </dl>
                <?php endif; ?>
                <?php if ($this->_var['order']['insure_fee'] > 0): ?>
                <dl class="total-row">
                    <dt class="total-label"><?php echo $this->_var['lang']['insure_fee']; ?>：</dt>
                    <dd class="total-value">+  <?php echo $this->_var['order']['formated_insure_fee']; ?></dd>
                </dl>
                <?php endif; ?>
                <?php if ($this->_var['order']['pay_fee'] > 0): ?>
                <dl class="total-row">
                    <dt class="total-label"><?php echo $this->_var['lang']['pay_fee']; ?>：</dt>
                    <dd class="total-value">+  <?php echo $this->_var['order']['formated_pay_fee']; ?></dd>
                </dl>
                <?php endif; ?>
                <?php if ($this->_var['order']['pack_fee'] > 0): ?>
                <dl class="total-row">
                    <dt class="total-label"><?php echo $this->_var['lang']['pack_fee']; ?>：</dt>
                    <dd class="total-value">+  <?php echo $this->_var['order']['formated_pack_fee']; ?></dd>
                </dl>
                <?php endif; ?>				
                <?php if ($this->_var['order']['card_fee'] > 0): ?>
                <dl class="total-row">
                    <dt class="total-label"><?php echo $this->_var['lang']['card_fee']; ?>：</dt>
                    <dd class="total-value">+ <?php echo $this->_var['order']['formated_card_fee']; ?></dd>
                </dl>
                <?php endif; ?>
                <?php if ($this->_var['order']['shipping_fee'] > 0): ?>
                <dl class="total-row">
                    <dt class="total-label"><?php echo $this->_var['lang']['shipping_fee']; ?>：</dt>
                    <dd class="total-value">+ <?php echo $this->_var['order']['formated_shipping_fee']; ?></dd>
                </dl>
                <?php endif; ?>
                <?php if ($this->_var['order']['use_val'] > 0): ?>
                <dl class="total-row">
                    <dt class="total-label"><?php echo $this->_var['lang']['use_value_card']; ?>：</dt>
                    <dd class="total-value">- <?php echo $this->_var['order']['formated_value_card']; ?></dd>
                </dl>
                <?php endif; ?>
                <?php if ($this->_var['order']['money_paid'] > 0): ?>
                <dl class="total-row">
                    <dt class="total-label"><?php echo $this->_var['lang']['order_money_paid']; ?>：</dt>
                    <dd class="total-value">- <?php echo $this->_var['order']['formated_money_paid']; ?></dd>
                </dl>
                <?php endif; ?>
                <?php if ($this->_var['order']['surplus'] > 0): ?>
                <dl class="total-row">
                    <dt class="total-label"><?php echo $this->_var['lang']['use_surplus']; ?>：</dt>
                    <dd class="total-value">- <?php echo $this->_var['order']['formated_surplus']; ?></dd>
                </dl>
                <?php endif; ?>
                <?php if ($this->_var['order']['integral_money'] > 0): ?>
                <dl class="total-row">
                    <dt class="total-label">积分抵用：</dt>
                    <dd class="total-value">- <?php echo $this->_var['order']['formated_integral_money']; ?></dd>
                </dl>
                <?php endif; ?>
                <?php if ($this->_var['order']['bonus'] > 0): ?>
                <dl class="total-row">
                    <dt class="total-label"><?php echo $this->_var['lang']['use_bonus']; ?>：</dt>
                    <dd class="total-value">- <?php echo $this->_var['order']['formated_bonus']; ?></dd>
                </dl>
                <?php endif; ?>
                <?php if ($this->_var['order']['coupons'] > 0): ?>
                <dl class="total-row">
                    <dt class="total-label"><?php echo $this->_var['lang']['preferential']; ?>：</dt>
                    <dd class="total-value">- <?php echo $this->_var['order']['formated_coupons']; ?></dd>
                </dl>
                <?php endif; ?>
                <dl class="total-row">
                    <dt class="total-label"><?php if ($this->_var['order']['order_amount'] > 0 && $this->_var['order']['extension_code'] == 'presale' && $this->_var['order']['pay_status'] == 0): ?><?php echo $this->_var['lang']['Deposit_user']; ?>：<?php else: ?><?php if ($this->_var['order']['pay_status'] == 2): ?>应付总额<?php else: ?><?php echo $this->_var['lang']['Deposit_user_one']; ?><?php endif; ?>：<?php endif; ?></dt>
                    <dd class="total-value"><?php echo $this->_var['order']['formated_order_amount']; ?></dd>
                </dl>
            </div>
        </div>
        <?php endif; ?> 
        	

        
        <?php if ($this->_var['action'] == 'return_detail'): ?>		
        <form id="returnInfo" name="returnInfo" method="post" action="user.php" onsubmit="return shipping_sub(this)">
        <div class="user-mod user-order-detail">
            <div class="user-title mb0">
                <h2><?php echo $this->_var['lang']['detailed_info']; ?></h2>
            </div>
            <div class="user-info-list b-t-0">
                <div class="info-title"><h2><?php echo $this->_var['lang']['detailed_info']; ?></h2></div>
                <div class="info-content">
                    <div class="info-item info-item-100">
                        <div class="item-label"><?php echo $this->_var['lang']['return_sn']; ?>：</div>
                        <div class="item-value"><?php echo $this->_var['goods']['return_sn']; ?></div>
                    </div>
                    <div class="info-item">
                        <div class="item-label"><?php echo $this->_var['lang']['apply_time']; ?>：</div>
                        <div class="item-value"><?php echo $this->_var['goods']['apply_time']; ?></div>
                    </div>
                    <div class="info-item">
                        <div class="item-label"><?php echo $this->_var['lang']['return_type_user']; ?>：</div>
                        <div class="item-value"><?php if ($this->_var['goods']['return_type'] == 0): ?><?php echo $this->_var['lang']['order_return_type']['0']; ?><?php elseif ($this->_var['goods']['return_type'] == 1): ?><?php echo $this->_var['lang']['order_return_type']['1']; ?><?php elseif ($this->_var['goods']['return_type'] == 2): ?><?php echo $this->_var['lang']['order_return_type']['2']; ?><?php elseif ($this->_var['goods']['return_type'] == 3): ?><?php echo $this->_var['lang']['order_return_type']['3']; ?><?php endif; ?></div>
                    </div>
                </div>
            </div>
            <div class="user-info-list">
                <div class="info-title"><h2><?php echo $this->_var['lang']['order_status']; ?></h2></div>
                <div class="info-content">
                    <div class="info-item">
                        <div class="item-label"><?php echo $this->_var['lang']['order_status']; ?>：</div>
                        <div class="item-value"><?php echo $this->_var['goods']['return_status']; ?></div>
                    </div>
                    <div class="info-item">
                        <div class="item-label"><?php echo $this->_var['lang']['back_cause']; ?>：</div>
                        <div class="item-value"><?php echo $this->_var['goods']['return_brief']; ?></div>
                    </div>
                    <div class="info-item">
                        <div class="item-label"><?php echo $this->_var['lang']['order_status']; ?>：</div>
                        <div class="item-value ftx-01"><?php if ($this->_var['goods']['return_status1'] < 0): ?><?php echo $this->_var['lang']['only_return_money']; ?><?php else: ?><?php echo $this->_var['lang']['rf'][$this->_var['goods']['return_status1']]; ?><?php endif; ?>-<?php echo $this->_var['lang']['ff'][$this->_var['goods']['refound_status1']]; ?></div>
                    </div>
                    <?php if ($this->_var['goods']['action_note']): ?>
                    <div class="info-item">
                        <div class="item-label"><?php echo $this->_var['lang']['after_service_desc']; ?>：</div>
                        <div class="item-value"><?php echo $this->_var['goods']['action_note']; ?></div>
                    </div>
                    <?php endif; ?>
                </div>
            </div>
            <div class="user-info-list">
                <div class="info-title"><h2><?php echo $this->_var['lang']['contact_username']; ?></h2></div>
                <div class="info-content">
                    <div class="info-item">
                        <div class="item-label"><?php echo $this->_var['lang']['contact_username']; ?>：</div>
                        <div class="item-value"><?php echo $this->_var['goods']['addressee']; ?></div>
                    </div>
                    <div class="info-item">
                        <div class="item-label"><?php echo $this->_var['lang']['Contact_address']; ?>：</div>
                        <div class="item-value"><?php echo $this->_var['goods']['address_detail']; ?></div>
                    </div>
                    <div class="info-item">
                        <div class="item-label"><?php echo $this->_var['lang']['contact_phone']; ?>：</div>
                        <div class="item-value"><?php echo $this->_var['goods']['phone']; ?></div>
                    </div>
                </div>
            </div>
            <?php if ($this->_var['goods']['return_type'] == 2): ?>
            <div class="user-info-list">
                <div class="info-title"><h2><?php echo $this->_var['lang']['progress_return']; ?></h2></div>
                <div class="user-order-list">
                    <dl class="item relative">
                        <dt class="item-t b-b-0">
                            <div class="t-statu"><?php if ($this->_var['goods']['return_status1'] == 4): ?>已完成<?php else: ?>发货中<?php endif; ?></div>
                            <div class="t-info">
                                <span class="info-item"><?php echo $this->_var['lang']['order_number']; ?>：<?php echo $this->_var['goods']['order_sn']; ?></span>
                                <span class="info-item"><?php echo $this->_var['lang']['Waybill']; ?>：<?php if ($this->_var['goods']['out_invoice_no'] != ""): ?><?php echo $this->_var['goods']['out_invoice_no']; ?><?php else: ?>&nbsp;<?php endif; ?></span>
                                <span class="info-item"><?php echo $this->_var['lang']['Logistics_company']; ?>：<?php if ($this->_var['goods']['out_invoice_no'] != ""): ?><?php echo $this->_var['goods']['out_shipp_shipping']; ?><?php else: ?>&nbsp;<?php endif; ?></span>
                            </div>
                            <div class="t-right" ectype="track-packages-btn">
                                <a href="javascript:void(0)" class="sc-btn"><i class="iconfont icon-truck"></i>跟踪</a>
                                <div class="comment-box" ectype="track-packages-info">
                                    <i class="box-i"></i>
                                    <div class="conmment-box-content">
                                        <div class="cont" id="seller_deliveryInfo">
                                            
                                        </div>
                                    </div>
                                </div>
                                <span id="invoice_no_<?php echo $this->_var['goods']['order_id']; ?>" style="display:none"><?php echo $this->_var['goods']['out_invoice_no']; ?></span>
                                <span id="shipping_name_<?php echo $this->_var['goods']['order_id']; ?>" style="display:none"><?php echo $this->_var['goods']['out_shipp_shipping']; ?></span>
                            </div>
                        </dt>
                    </dl>
                </div>
            </div>
            <?php if ($this->_var['goods']['out_invoice_no']): ?>          
                <script language="javascript">
                $("#seller_deliveryInfo").html("<center>"+json_languages.logistics_tracking_in+"</center>");
                if(document.getElementById("shipping_name_<?php echo $this->_var['goods']['order_id']; ?>"))
                {
                    var expressid = document.getElementById("shipping_name_<?php echo $this->_var['goods']['order_id']; ?>").innerHTML;
                    var expressno = document.getElementById("invoice_no_<?php echo $this->_var['goods']['order_id']; ?>").innerHTML;
                }
                $.ajax({
                    url: "plugins/kuaidi/express.php",
                    type: "post",
                    data:'com=' + expressid + '&nu=' + expressno,
                    success: function(data,textStatus){
                        $("#seller_deliveryInfo").html(data);
                    },
                     error: function(o){
                    }
                });
                </script> 
            <?php endif; ?>
            <?php endif; ?>
            <?php if ($this->_var['goods']['agree_apply']): ?>
            <div class="user-info-list">
                <div class="info-title">
                    <h2><?php echo $this->_var['lang']['Express_info']; ?></h2>
                </div>
                <?php if ($this->_var['goods']['back_shipp_shipping']): ?>
                <div class="express_list">
                    <div class="ex_tit"><?php echo $this->_var['lang']['User_sent']; ?></div>
                    <div class="ex_con">
                        <div class="ex_item">
                            <span><?php echo $this->_var['lang']['Express_company']; ?>：</span>
                            <span class="blue"><?php echo $this->_var['goods']['back_shipp_shipping']; ?></span>
                        </div>
                        <div class="ex_item">
                            <span><?php echo $this->_var['lang']['courier_sz']; ?>：</span>
                            <span class="blue"><?php echo $this->_var['goods']['back_invoice_no']; ?></span>
                        </div>
                    </div>
                </div>  
                <div class="blank"></div>
                <?php else: ?>
                <div class="express_list">
                    <div class="ex_tit lh26"><?php echo $this->_var['lang']['Express_info_two']; ?></div>
                    <div class="ex_con">
                        <div class="ex_item">
                            <span><?php echo $this->_var['lang']['Express_company']; ?>：</span>
                            <select name="express_name" onchange="select_express(this)" class="select">
                                <option value="0"><?php echo $this->_var['lang']['select_Express_company']; ?></option><?php $_from = $this->_var['shipping_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'shipping');if (count($_from)):
    foreach ($_from AS $this->_var['shipping']):
?>
                                <option value="<?php echo $this->_var['shipping']['shipping_id']; ?>"><?php echo $this->_var['shipping']['shipping_name']; ?></option><?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
                                <option value="999"><?php echo $this->_var['lang']['Other']; ?></option>
                            </select>
                            <input type="text" name="other_express" id="other_express" class="ml10"  style="display:none"/>
                        </div>
                        <div class="ex_item">
                            <span><?php echo $this->_var['lang']['courier_sz']; ?>：</span>
                            <input type="text" name="express_sn" class="text text-2"/>
                        </div>
                        <input type="submit" class="btn sc-redBg-btn btn30 ml75" value="<?php echo $this->_var['lang']['button_submit']; ?>"/>
                        <input type="hidden" name="act" value="edit_express">
                        <input type="hidden" name="order_id" value="<?php echo $this->_var['goods']['order_id']; ?>" />
                        <input type="hidden" name="ret_id" value="<?php echo $this->_var['goods']['ret_id']; ?>" />
                    </div>
                </div> 
                <?php endif; ?>
                <?php if ($this->_var['goods']['out_shipp_shipping']): ?>
                <div class="express_list">
                    <div class="ex_tit"><?php echo $this->_var['lang']['seller_shipping']; ?></div>
                    <div class="ex_con">
                        <div class="ex_item">
                            <span><?php echo $this->_var['lang']['Express_company']; ?>：</span>
                            <span class="blue"><?php echo $this->_var['goods']['out_shipp_shipping']; ?></span>
                        </div>
                        <div class="ex_item">
                            <span><?php echo $this->_var['lang']['courier_sz']; ?>：</span>
                            <span class="blue"><?php echo $this->_var['goods']['out_invoice_no']; ?></span>
                        </div>
                    </div>        
                </div>
                <?php endif; ?>
            </div>
            <?php endif; ?>
            <div class="user-table-list">
                <div class="pt10 pb10">
                <a href="<?php echo $this->_var['goods']['shop_url']; ?>" class="user-shop-link"><?php echo $this->_var['goods']['shop_name']; ?></a>
                    <?php if ($this->_var['goods']['is_IM'] == 1 || $this->_var['goods']['is_dsc']): ?>
                    <a id="IM" onclick="openWin(this)" href="javascript:;" ru_id="<?php echo $this->_var['goods']['ru_id']; ?>"  class="iconfont icon-kefu user-shop-kefu"></a>
                    <?php else: ?>
                    <?php if ($this->_var['goods']['kf_type'] == 1): ?>
                    <a href="http://www.taobao.com/webww/ww.php?ver=3&touid=<?php echo $this->_var['goods']['kf_ww']; ?>&siteid=cntaobao&status=1&charset=utf-8" class="iconfont icon-kefu user-shop-kefu" target="_blank"></a>
                    <?php else: ?>
                    <a href="http://wpa.qq.com/msgrd?v=3&uin=<?php echo $this->_var['goods']['kf_qq']; ?>&site=qq&menu=yes" class="iconfont icon-kefu user-shop-kefu" target="_blank"></a>
                    <?php endif; ?>
                    <?php endif; ?>					
                </div>
                <table class="user-table user-table-detail-goods">
                    <colgroup>
                        <col width="320">
                        <col width="110">
                        <col width="120">
                        <col width="95">
                        <col width="90">
                        <col>
                    </colgroup>
                    <thead>
                        <tr>
                            <th><?php echo $this->_var['lang']['goods']; ?></th>
                            <th class="tl"><?php echo $this->_var['lang']['goods_attr']; ?></th>
                            <th class="tl"><?php echo $this->_var['lang']['unit_price_user']; ?></th>
                            <th class="tl"><?php echo $this->_var['lang']['number_to']; ?></th>
                            <th><?php echo $this->_var['lang']['ws_subtotal']; ?></th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>
                                <a href="<?php echo $this->_var['goods']['url']; ?>" class="img"><img src="<?php echo $this->_var['goods']['goods_thumb']; ?>" alt=""></a>						
                                <a href="<?php echo $this->_var['goods']['url']; ?>" class="name"><?php echo sub_str($this->_var['goods']['goods_name'],25); ?></a>
                            </td>
                            <td><?php echo nl2br($this->_var['goods']['goods_attr']); ?></td>
                            <td><?php echo $this->_var['goods']['goods_price']; ?></td>
                            <td>x<?php echo $this->_var['goods']['return_number']; ?></td>
                            <td><?php echo $this->_var['goods']['should_return']; ?></td>
                        </tr>
                    </tbody>
                </table>
                <?php if ($this->_var['goods']['return_type'] == 1 || $this->_var['goods']['return_type'] == 3): ?>
                    <?php if ($this->_var['goods']['return_shipping_fee'] && $this->_var['goods']['refound_status1'] == 1): ?>
                    <div class="user-order-detail-total">
                        <dl class="total-row" style="margin-bottom:0px;">
                            <dt class="total-label"><?php echo $this->_var['lang']['return_shipping']; ?>：</dt>
                            <dd class="total-value" style="font-size:14px; font-weight:normal; color:#999"> + <?php echo $this->_var['goods']['formated_return_shipping_fee']; ?></dd>
                        </dl>
                    </div>
                    <div class="user-order-detail-total" style=" margin-top:0px;">
                        <dl class="total-row" style="margin-top:0px; margin-bottom:0px;">
                            <dt class="total-label"><?php echo $this->_var['lang']['amount_return']; ?>：</dt>
                            <dd class="total-value" style="font-size:14px; font-weight:normal; color:#999"> + <?php echo $this->_var['goods']['formated_should_return']; ?></dd>
                        </dl>
                    </div>
                    <div class="user-order-detail-total" style=" margin-top:0px;">
                        <dl class="total-row" style="margin-top:0px;">
                            <dt class="total-label"><?php echo $this->_var['lang']['return_total']; ?>：</dt>
                            <dd class="total-value" style="font-size:18px; font-weight:normal"><?php echo $this->_var['goods']['formated_return_amount']; ?></dd>
                        </dl>
                    </div>
                    <?php else: ?>
                    <div class="user-order-detail-total">
                        <dl class="total-row">
                            <dt class="total-label"><?php echo $this->_var['lang']['amount_return']; ?>：</dt>
                            <dd class="total-value"><?php echo $this->_var['goods']['should_return']; ?></dd>
                        </dl>
                    </div>
                    <?php endif; ?>
                <?php endif; ?>
            </div>
            <?php if ($this->_var['goods']['img_list']): ?>
            <div class="user-info-list b-t-0">
                <div class="info-title"><h2>图片凭证</h2></div>
                <div class="info-content">
                    <div class="info-item info-item-100">
                        <?php $_from = $this->_var['goods']['img_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'img');if (count($_from)):
    foreach ($_from AS $this->_var['img']):
?>
                        <a href="<?php echo $this->_var['img']['img_file']; ?>" target="_blank"><img src="<?php echo $this->_var['img']['img_file']; ?>" width="100" height="100" style="border:1px #ccc solid; padding:2px;" /></a>
                        <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
                    </div>
                </div>
            </div>
            <?php endif; ?>
            
        </div>
        </form>
        <?php endif; ?> 
        		
        
        
        <?php if ($this->_var['action'] == 'address_list'): ?>
        <div class="user-mod">
            <div class="user-title">
                <h2>收货地址</h2>
                <h3>您已创建<span class="red"><?php echo $this->_var['count_consignee']; ?></span>个收货地址，最多可创建<span class="red">10</span>个</h3>
            </div>
            <ul class="cosignee-list">
                <?php if ($this->_var['count_consignee'] < 11): ?>
                <li>
                    <div class="consignee-inner">
                        <a href="user.php?act=address" class="consignee-add"  data-dialog="dialog" data-divid="newAddress" data-id="" data-name="<?php echo $this->_var['lang']['consignee_new']; ?>">
                            <i class="iconfont icon-add-quer"></i>
                            <p><?php echo $this->_var['lang']['consignee_new']; ?></p>
                        </a>
                    </div>
                </li>				
                <?php endif; ?>
                <?php if ($this->_var['new_consignee_list']): ?>
                <?php $_from = $this->_var['new_consignee_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('sn', 'consignee');if (count($_from)):
    foreach ($_from AS $this->_var['sn'] => $this->_var['consignee']):
?>
                <li class="consignee_list_<?php echo $this->_var['consignee']['address_id']; ?>">
                    <div class="consignee-inner">
                        <div class="head">
                            <div class="handle">
                            <?php if ($this->_var['consignee']['address_id'] == $this->_var['address'] && $this->_var['address'] > 0): ?><?php else: ?><a href="javascript:makeAddressAllDefault(<?php echo $this->_var['consignee']['address_id']; ?>);"><?php echo $this->_var['lang']['default_consignee_to']; ?></a><?php endif; ?>
                                <a href="user.php?act=address&aid=<?php echo $this->_var['consignee']['address_id']; ?>"><?php echo $this->_var['lang']['modify']; ?></a>
                                <a href="javascript:alertDelAddressDiag(<?php echo $this->_var['consignee']['address_id']; ?>);"><?php echo $this->_var['lang']['drop']; ?></a>
                            </div>
                            <div class="title">
                                <span class="name"><?php echo $this->_var['consignee']['consignee']; ?></span>
                                <span class="province">
                                <?php if ($this->_var['consignee']['district_name']): ?>
                                    <?php echo $this->_var['consignee']['district_name']; ?>
                                    <?php if ($this->_var['consignee']['street_name']): ?>
                                    &nbsp;<?php echo $this->_var['consignee']['street_name']; ?>
                                    <?php endif; ?>
                                <?php else: ?>
                                    <?php echo $this->_var['consignee']['city_name']; ?>
                                <?php endif; ?>
                                </span>
                                <?php if ($this->_var['consignee']['address_id'] == $this->_var['address'] && $this->_var['address'] > 0): ?><span class="tag">默认地址</span><?php endif; ?>
                            </div>
                        </div>
                        <div class="body">
                            <p><?php echo $this->_var['consignee']['mobile']; ?></p>
                            <p><?php echo $this->_var['consignee']['region']; ?>&nbsp;<?php echo $this->_var['consignee']['address']; ?></p>
                        </div>
                    </div>
                </li>
                <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
                <?php endif; ?>
            </ul>
        </div>
        <?php endif; ?> 
        	
        
        
        <?php if ($this->_var['action'] == 'address'): ?>
        <div class="user-mod">
            <div class="user-title">
                <h2><?php if ($this->_var['address_id'] == 0): ?><?php echo $this->_var['lang']['Newly']; ?><?php else: ?><?php echo $this->_var['lang']['edit']; ?><?php endif; ?><?php echo $this->_var['lang']['consignee_info']; ?></h2>
            </div>
            <div class="user-form">
                <form action="user.php" method="post" class="user-form" name="theForm" onsubmit="return checkConsignee(this)">
                    <div class="form-row">
                        <div class="form-label"><span class="red">*</span><?php echo $this->_var['lang']['consignee']; ?>：</div>
                        <div class="form-value"><input type="text" name="consignee" value="<?php echo $this->_var['consignee']['consignee']; ?>" class="form-input"></div>
                    </div>
                    <div class="form-row">
                        <div class="form-label"><span class="red">*</span><?php echo $this->_var['lang']['label_mobile']; ?>：</div>
                        <div class="form-value">
                            <input type="text" name="mobile" value="<?php echo $this->_var['consignee']['mobile']; ?>" class="form-input">
                            <span class="fl"><?php echo $this->_var['lang']['label_tel']; ?>：</span>
                            <input type="text" name="tel" value="<?php echo $this->_var['consignee']['tel']; ?>" class="form-input">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-label form-label-lh"><span class="red">*</span><?php echo $this->_var['lang']['Local_area']; ?>：</div>
                        <div class="form-value" ectype="regionLinkage">
                            <dl class="mod-select mod-select-small" ectype="smartdropdown">
                                <dt>
                                    <span class="txt" ectype="txt"><?php echo $this->_var['lang']['please_select']; ?><?php echo $this->_var['name_of_region']['0']; ?></span>
                                    <input type="hidden" value="<?php echo $this->_var['consignee']['country']; ?>" name="country">
                                </dt>
                                <dd ectype="layer">
                                    <?php $_from = $this->_var['country_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'country');if (count($_from)):
    foreach ($_from AS $this->_var['country']):
?>
                                    <div class="option" data-value="<?php echo $this->_var['country']['region_id']; ?>" data-text="<?php echo $this->_var['country']['region_name']; ?>" ectype="ragionItem" data-type="1"><?php echo $this->_var['country']['region_name']; ?></div>
                                    <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
                                </dd>
                            </dl>
                            <dl class="mod-select mod-select-small" ectype="smartdropdown">
                                <dt><span class="txt" ectype="txt"><?php echo $this->_var['lang']['please_select']; ?><?php echo $this->_var['name_of_region']['1']; ?></span><input type="hidden" value="<?php echo $this->_var['consignee']['province']; ?>" ectype="ragionItem" name="province"></dt>
                                <dd ectype="layer">
                                    <div class="option" data-value="0"><?php echo $this->_var['lang']['please_select']; ?><?php echo $this->_var['name_of_region']['1']; ?></div>
                                    <?php $_from = $this->_var['province_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'province_0_70270800_1507431355');if (count($_from)):
    foreach ($_from AS $this->_var['province_0_70270800_1507431355']):
?>
                                    <div class="option" data-value="<?php echo $this->_var['province_0_70270800_1507431355']['region_id']; ?>" data-text="<?php echo $this->_var['province_0_70270800_1507431355']['region_name']; ?>" data-type="2" ectype="ragionItem"><?php echo $this->_var['province_0_70270800_1507431355']['region_name']; ?></div>
                                    <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
                                </dd>
                            </dl>
                            <dl class="mod-select mod-select-small" ectype="smartdropdown">
                                <dt><span class="txt" ectype="txt"><?php echo $this->_var['lang']['please_select']; ?><?php echo $this->_var['name_of_region']['2']; ?></span><input type="hidden" value="<?php echo $this->_var['consignee']['city']; ?>" name="city" ></dt>
                                <dd ectype="layer">
                                    <div class="option" data-value="0"><?php echo $this->_var['lang']['please_select']; ?><?php echo $this->_var['name_of_region']['2']; ?></div>
                                    <?php $_from = $this->_var['city_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'city');if (count($_from)):
    foreach ($_from AS $this->_var['city']):
?>
                                    <div class="option" data-value="<?php echo $this->_var['city']['region_id']; ?>" data-type="3" data-text="<?php echo $this->_var['city']['region_name']; ?>" ectype="ragionItem"><?php echo $this->_var['city']['region_name']; ?></div>
                                    <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
                                </dd>
                            </dl>
                            <dl class="mod-select mod-select-small" ectype="smartdropdown" style="display:none">
                                <dt><span class="txt" ectype="txt"><?php echo $this->_var['lang']['please_select']; ?><?php echo $this->_var['name_of_region']['3']; ?></span><input type="hidden" value="<?php echo $this->_var['consignee']['district']; ?>" name="district"></dt>
                                <dd ectype="layer">
                                    <div class="option" data-value="0"><?php echo $this->_var['lang']['please_select']; ?><?php echo $this->_var['name_of_region']['3']; ?></div>
                                    <?php $_from = $this->_var['district_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'district');if (count($_from)):
    foreach ($_from AS $this->_var['district']):
?>
                                    <div class="option" data-value="<?php echo $this->_var['district']['region_id']; ?>" data-type="4" data-text="<?php echo $this->_var['district']['region_name']; ?>" ectype="ragionItem"><?php echo $this->_var['district']['region_name']; ?></div>
                                    <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
                                </dd>
                            </dl>
                            <dl class="mod-select mod-select-small" ectype="smartdropdown" style="display:none">
                                <dt><span class="txt" ectype="txt"><?php echo $this->_var['lang']['please_select']; ?><?php echo $this->_var['name_of_region']['3']; ?></span><input type="hidden" value="<?php echo $this->_var['consignee']['street']; ?>" name="street"></dt>
                                <dd ectype="layer">
                                    <div class="option" data-value="0"><?php echo $this->_var['lang']['please_select']; ?><?php echo $this->_var['name_of_region']['3']; ?></div>
                                    <?php $_from = $this->_var['street_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'street');if (count($_from)):
    foreach ($_from AS $this->_var['street']):
?>
                                    <div class="option" data-value="<?php echo $this->_var['street']['region_id']; ?>" data-type="5" data-text="<?php echo $this->_var['street']['region_name']; ?>" ectype="ragionItem"><?php echo $this->_var['street']['region_name']; ?></div>
                                    <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
                                </dd>
                            </dl>
                        </div>
                        <span id="consigneeEreaNote" class="status error hide"></span>
                    </div>
                    <div class="form-row">
                        <div class="form-label"><span class="red">*</span><?php echo $this->_var['lang']['detailed_address']; ?>：</div>
                        <div class="form-value"><input type="text" name="address" value="<?php echo $this->_var['consignee']['address']; ?>" class="form-input form-input-long"></div>
                    </div>
                    <div class="form-row">
                        <div class="form-label"><span class="red">&nbsp;&nbsp;</span><?php echo $this->_var['lang']['postalcode']; ?>：</div>
                        <div class="form-value"><input type="text" name="zipcode" value="<?php echo $this->_var['consignee']['zipcode']; ?>" class="form-input"></div>
                    </div>
                    <div class="form-row">
                        <div class="form-label"><span class="red">&nbsp;&nbsp;</span><?php echo $this->_var['lang']['email_reset']; ?>：</div>
                        <div class="form-value"><input type="text" name="email" value="<?php echo $this->_var['consignee']['email']; ?>" class="form-input"></div>
                    </div>
                    <div class="form-row">
                        <div class="form-label"><span class="red">&nbsp;&nbsp;</span><?php echo $this->_var['lang']['sign_building']; ?>：</div>
                        <div class="form-value"><input type="text"  name="sign_building" value="<?php echo $this->_var['consignee']['sign_building']; ?>" class="form-input"></div>
                    </div>
                    <div class="form-btn-wp">
                        <input type="submit" name="submit" class="form-btn"  value="<?php echo $this->_var['lang']['submit_address']; ?>"/>
                        <input type="reset" class="form-btn form-btn-gray" value="重置">
                        <input type="hidden" name="address_id" value="<?php echo $this->_var['consignee']['address_id']; ?>" />
                        <input type="hidden" name="act" value="act_edit_address" />
                    </div>
                </form>
            </div>
        </div>	
        <?php endif; ?> 
        	

        
        <?php if ($this->_var['action'] == 'return_list'): ?>
        <div class="user-mod">
            <div class="user-title">
                <h2><?php echo $this->_var['lang']['label_return']; ?></h2>
                <h3><?php echo $this->_var['lang']['youhave']; ?><span class="red"><?php echo $this->_var['pager']['record_count']; ?></span><?php echo $this->_var['lang']['return_goods_user']; ?></h3>
            </div>
            <div id="return_list">
                <?php echo $this->fetch('library/user_return_order_list.lbi'); ?>
            </div>
        </div>
        <?php endif; ?> 
        
        
         
        <?php if ($this->_var['action'] == 'goods_order'): ?>
        <div class="user-mod">
            <div class="user-title">
                <h2><?php echo $this->_var['lang']['return_list']; ?></h2>
            </div>
            <div class="uaer-return-app clearfix">
                <?php $_from = $this->_var['goods_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'goods');if (count($_from)):
    foreach ($_from AS $this->_var['goods']):
?>
                <div class="tl-item">
                    <div class="item-t">
                        <div class="t-goods">
                            <div class="t-img">
                                <?php if ($this->_var['goods']['goods_id'] > 0 && $this->_var['goods']['extension_code'] != 'package_buy'): ?> 
                                    <a href="<?php echo $this->_var['goods']['url']; ?>" target="_blank" class="f6"><img width="55" height="55" src="<?php echo $this->_var['goods']['goods_thumb']; ?>" title="<?php echo $this->_var['goods']['goods_name']; ?>"></a> 
                                <?php if ($this->_var['goods']['parent_id'] > 0): ?> 
                                    <span style="color:#FF0000">（<?php echo $this->_var['lang']['accessories']; ?>）</span> 
                                <?php elseif ($this->_var['goods']['is_gift']): ?> 
                                    <span style="color:#FF0000">（<?php echo $this->_var['lang']['largess']; ?>）</span> 
                                <?php endif; ?> 
                                <?php elseif ($this->_var['goods']['goods_id'] > 0 && $this->_var['goods']['extension_code'] == 'package_buy'): ?> 
                                    <a href="javascript:void(0)" onclick="setSuitShow(<?php echo $this->_var['goods']['goods_id']; ?>)" class="f6"><img width="55" height="55" src="<?php echo $this->_var['goods']['goods_thumb']; ?>" title="<?php echo $this->_var['goods']['goods_name']; ?>"><span style="color:#FF0000;"><?php echo $this->_var['lang']['remark_package']; ?></span></a>
                                    <div id="suit_<?php echo $this->_var['goods']['goods_id']; ?>" style="display:none"> 
                                        <?php $_from = $this->_var['goods']['package_goods_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'package_goods_list');if (count($_from)):
    foreach ($_from AS $this->_var['package_goods_list']):
?> 
                                            <a href="<?php echo $this->_var['package_goods_list']['url']; ?>" target="_blank" class="f6"><img width="55" height="55" src="<?php echo $this->_var['goods']['goods_thumb']; ?>" title="<?php echo $this->_var['goods']['goods_name']; ?>"></a><br />
                                        <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?> 
                                    </div>
                                <?php endif; ?>
                            </div>
                            <div class="t-info">
                                <div class="info-name"><a href="<?php echo $this->_var['goods']['url']; ?>" class="ftx-03" target="_blank"><?php echo $this->_var['goods']['goods_name']; ?></a></div>
                                <div class="info-price"><b><?php echo $this->_var['goods']['goods_price']; ?></b><i>×</i><span><?php echo $this->_var['goods']['goods_number']; ?></span></div>
                                <div class="info-attr"><?php if ($this->_var['goods']['goods_attr']): ?><?php echo $this->_var['goods']['goods_attr']; ?><?php else: ?><?php echo $this->_var['lang']['nothing']; ?><?php endif; ?></div>
                            </div>
                        </div>
                        <div class="t-statu">
                        <?php if ($this->_var['goods']['is_refound'] > 0): ?>
                        	<span class="ftx-01 fs14"><?php echo $this->_var['lang']['Have_applied']; ?></span> 
                        <?php else: ?> 
                        	<a href="user.php?act=apply_return&rec_id=<?php echo $this->_var['goods']['rec_id']; ?>&order_id=<?php echo $this->_var['order_id']; ?>" class="sc-btn"><?php echo $this->_var['lang']['applied']; ?></a> 
                        <?php endif; ?>
                        </div>
                    </div>
                    <div class="item-f">
                        <div class="f-left"></div>
                        <div class="f-right"><?php echo $this->_var['lang']['shopping_money']; ?><?php if ($this->_var['order']['extension_code'] == "group_buy"): ?><?php echo $this->_var['lang']['gb_deposit']; ?><?php endif; ?>：<?php echo $this->_var['goods']['subtotal']; ?></div>
                    </div>
                </div>
                <?php endforeach; else: ?>
                <div class="no_records">
                    <i class="no_icon_two"></i>
                    <div class="no_info"><h3>您的订单无可退换商品。</h3></div>
                </div>
                <?php endif; unset($_from); ?><?php $this->pop_vars();; ?>
            </div>
        </div>    
        <?php endif; ?> 
        
        
         
        <?php if ($this->_var['action'] == 'service_detail'): ?>
        <div class="user-mod">
            <div class="user-title">
                <h2>服务说明</h2>
                <a href="javascript:history.go(-1);" class="more">返回</a>
            </div>
            <table class="user-table user-table-detail-goods">
                <colgroup>
                    <col width="170">
                    <col width="350">
                    <col width="110">
                    <col width="110">
                    <col>
                </colgroup>
                <thead>
                    <tr>
                        <th class="tl"><?php echo $this->_var['lang']['Return_type']; ?></th>
                        <th class="tl"><?php echo $this->_var['lang']['Return_reason']; ?></th>
                        <th><?php echo $this->_var['lang']['Return_one']; ?></th>
                        <th><?php echo $this->_var['lang']['Return_two']; ?></th>
                        <th><?php echo $this->_var['lang']['Return_three']; ?></th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><?php echo $this->_var['lang']['Performance_fault']; ?></td>
                        <td><?php echo $this->_var['lang']['Performance_fault_one']; ?></td>
                        <td class="tc"><?php echo $this->_var['lang']['yes']; ?></td>
                        <td class="tc"><?php echo $this->_var['lang']['yes']; ?></td>
                        <td class="tc"><?php echo $this->_var['lang']['yes']; ?></td>
                    </tr>
                    <tr>
                        <td><?php echo $this->_var['lang']['Missing_parts']; ?></td>
                        <td><?php echo $this->_var['lang']['Missing_parts_one']; ?></td>
                        <td class="tc"><?php echo $this->_var['lang']['yes']; ?></td>
                        <td class="tc"><?php echo $this->_var['lang']['yes']; ?></td>
                        <td class="tc"><?php echo $this->_var['lang']['no']; ?></td>
                    </tr>
                    <tr>
                        <td><?php echo $this->_var['lang']['Logistics_loss']; ?></td>
                        <td><?php echo $this->_var['lang']['Logistics_loss_one']; ?></td>
                        <td class="tc"><?php echo $this->_var['lang']['yes']; ?></td>
                        <td class="tc"><?php echo $this->_var['lang']['yes']; ?></td>
                        <td class="tc"><?php echo $this->_var['lang']['no']; ?></td>
                    </tr>
                    <tr>
                        <td><?php echo $this->_var['lang']['Inconsistent_goods']; ?></td>
                        <td><?php echo $this->_var['lang']['Inconsistent_goods_one']; ?></td>
                        <td class="tc"><?php echo $this->_var['lang']['yes']; ?></td>
                        <td class="tc"><?php echo $this->_var['lang']['yes']; ?></td>
                        <td class="tc"><?php echo $this->_var['lang']['no']; ?></td>
                    </tr>
                    <tr>
                        <td><?php echo $this->_var['lang']['Buy_wrong']; ?></td>
                        <td><?php echo $this->_var['lang']['Buy_wrong_one']; ?></td>
                        <td class="tc"><?php echo $this->_var['lang']['Buy_wrong_two']; ?></td>
                        <td class="tc"><?php echo $this->_var['lang']['no']; ?></td>
                        <td class="tc"><?php echo $this->_var['lang']['no']; ?></td>
                    </tr>
                </tbody>
            </table>
            <div class="user-prompt mt20">
                <div class="info">
                    <?php echo $this->_var['lang']['Return_Explain']; ?>
                </div>
            </div>
        </div>    
        <?php endif; ?>
         
        
         
        <?php if ($this->_var['action'] == 'apply_return'): ?>
        <div class="user-mod user_apply_return">
            <div class="user-title">
                <h2><?php echo $this->_var['lang']['return_list']; ?></h2>
                <a href="user.php?act=service_detail" class="more">服务说明</a>
            </div>
            <div class="uaer-return-app clearfix">
                <div class="tl-item">
                    <div class="item-t b-b-0">
                        <div class="t-goods">
                            <div class="t-img">
                                <?php if ($this->_var['goods_return']['goods_id'] > 0 && $this->_var['goods_return']['extension_code'] != 'package_buy'): ?> 
                                    <a href="<?php echo $this->_var['goods_return']['url']; ?>" target="_blank" class="f6">
                                        <img width="55" height="55" src="<?php echo $this->_var['goods_return']['goods_thumb']; ?>" title="<?php echo $this->_var['goods_return']['goods_name']; ?>">
                                    </a> 
                                    <?php if ($this->_var['goods_return']['parent_id'] > 0): ?> 
                                    <span class="red">（<?php echo $this->_var['lang']['accessories']; ?>）</span> 
                                    <?php elseif ($this->_var['goods_return']['is_gift']): ?> 
                                    <span class="red">（<?php echo $this->_var['lang']['largess']; ?>）</span> 
                                    <?php endif; ?> 
                                <?php elseif ($this->_var['goods_return']['goods_id'] > 0 && $this->_var['goods_return']['extension_code'] == 'package_buy'): ?> 
                                    <a href="javascript:void(0)" onclick="setSuitShow(<?php echo $this->_var['goods_return']['goods_id']; ?>)" class="f6">
                                        <img width="55" height="55" src="<?php echo $this->_var['goods_return']['goods_thumb']; ?>" title="<?php echo $this->_var['goods_return']['goods_name']; ?>"><span style="color:#FF0000;"><?php echo $this->_var['lang']['remark_package']; ?></span>
                                    </a>
                                    <div id="suit_<?php echo $this->_var['goods_return']['goods_id']; ?>" style="display:none"> 
                                        <?php $_from = $this->_var['goods_return']['package_goods_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'package_goods_list');if (count($_from)):
    foreach ($_from AS $this->_var['package_goods_list']):
?> 
                                            <a href="<?php echo $this->_var['package_goods_list']['url']; ?>" target="_blank" class="f6">
                                                <img width="55" height="55" src="<?php echo $this->_var['package_goods_list']['goods_thumb']; ?>" title="<?php echo $this->_var['package_goods_list']['goods_name']; ?>">
                                            </a>
                                        <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?> 
                                    </div>
                                <?php endif; ?>
                            </div>
                            <div class="t-info">
                                <div class="info-name"><a href="goods.php?id=<?php echo $this->_var['goods_return']['goods_id']; ?>" class="ftx-03" target="_blank"><?php echo $this->_var['goods_return']['goods_name']; ?></a></div>
                                <div class="info-price"><b><?php echo $this->_var['goods_return']['goods_price']; ?></b><i>×</i><span><?php echo $this->_var['goods_return']['goods_number']; ?></span></div>
                                <div class="info-attr"><?php if ($this->_var['goods_return']['goods_attr']): ?><?php echo $this->_var['goods_return']['goods_attr']; ?><?php else: ?><?php echo $this->_var['lang']['nothing']; ?><?php endif; ?></div>
                            </div>
                        </div>
                        <div class="t-statu"><?php echo $this->_var['goods_return']['subtotal']; ?></div>
                    </div>
                </div>
            </div>
            <div class="applyReturnForm">
                <form id="formReturn" name="formReturn" method="post" action="user.php" onsubmit="return check_sub()">
                    <div class="return_ts">
                        <em class="fl">* <?php echo $this->_var['lang']['reminder']; ?>：</em>
                        <div class="fl"><?php echo $this->_var['lang']['reminder_one']; ?>&nbsp;<em><?php echo $this->_var['goods_return']['user_name']; ?></em>&nbsp;<?php echo $this->_var['lang']['reminder_two']; ?></div>
                    </div>
                    <div class="form">
                        <?php if ($this->_var['goods_cause']): ?>
                        <div class="item item1 first">
                            <div class="label"><em>*</em><?php echo $this->_var['lang']['Service_type']; ?>：</div>
                            <div class="value value-checkbox">
                            	
                                <?php $_from = $this->_var['goods_cause']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'goods');if (count($_from)):
    foreach ($_from AS $this->_var['goods']):
?>
                                	<div class="value-item <?php if ($this->_var['goods']['is_checked'] == 1): ?>selected<?php endif; ?>">
                                        <input type="radio" id="service-<?php echo $this->_var['goods']['cause']; ?>" name="return_type" value="<?php echo $this->_var['goods']['cause']; ?>" class="ui-radio" autocomplete="off" <?php if ($this->_var['goods']['is_checked'] == 1): ?>checked<?php endif; ?> />
                                        <label for="service-<?php echo $this->_var['goods']['cause']; ?>" class="ui-radio-label"><?php echo $this->_var['goods']['lang']; ?></label>
                                    </div>
                            	<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
                                
                                <input name="return_rec_id" value="<?php echo $this->_var['goods_return']['rec_id']; ?>" type="hidden" />
                                <input name="return_g_id" value="<?php echo $this->_var['goods_return']['goods_id']; ?>" type="hidden" />
                                <input name="return_g_number" value="<?php echo $this->_var['goods_return']['goods_number']; ?>" type="hidden" />
                            </div>
                            <div class="lists" ectype="return_lists">
                                <div class="return_div" ectype="return_div">
                                    <div class="type_box1" name="type_maintain" id="maintain_<?php echo $this->_var['goods_return']['rec_id']; ?>">
                                        <div class="type_item"><?php echo $this->_var['lang']['Repair_number']; ?>：</div>
                                        <div class="type_con">
                                            <a onclick="buyNumber.minus(this, 1)" href="javascript:;" id="decrease" class="plus_minus"><i class="iconfont icon-reduce"></i></a>
                                            <input type="text" class="return_num" defaultnumber="1" value="1" id="maintain_<?php echo $this->_var['goods_return']['rec_id']; ?>" name="maintain_number" onblur="check_return_num(this,<?php echo $this->_var['goods_return']['goods_number']; ?> ,<?php echo $this->_var['goods_return']['rec_id']; ?>, 1)"/>
                                            <a onclick="buyNumber.plus(this, 1)" href="javascript:;" id="increase" class="plus_minus"><i class="iconfont icon-plus"></i></a>
                                            <div class="return_sm">(<?php echo $this->_var['lang']['Repair_one']; ?><span><?php echo $this->_var['goods_return']['goods_number']; ?></span><?php echo $this->_var['lang']['Repair_two']; ?><span id="maintain_span_<?php echo $this->_var['goods_return']['rec_id']; ?>" name="maintain">1</span><?php echo $this->_var['lang']['jian']; ?>)</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="return_div" ectype="return_div" style="display:none;">
                                    <div class="type_box1" name="type_box1" id="returnid_<?php echo $this->_var['goods_return']['rec_id']; ?>">
                                        <div class="type_item"><?php echo $this->_var['lang']['return_number']; ?>：</div>
                                        <div class="type_con">
                                            <a onclick="buyNumber.minus(this, 1)" href="javascript:;" id="decrease" class="plus_minus"><i class="iconfont icon-reduce"></i></a>
                                            <input type="text" class="return_num" defaultnumber="1" value="1" id="returnid_<?php echo $this->_var['goods_return']['rec_id']; ?>" name="return_num" onblur="check_return_num(this,<?php echo $this->_var['goods_return']['goods_number']; ?> ,<?php echo $this->_var['goods_return']['rec_id']; ?>, 2)" />
                                            <a onclick="buyNumber.plus(this, 1)" href="javascript:;" id="increase" class="plus_minus"><i class="iconfont icon-plus"></i></a>
                                            <div class="return_sm">(<?php echo $this->_var['lang']['return_one']; ?><span><?php echo $this->_var['goods_return']['goods_number']; ?></span><?php echo $this->_var['lang']['return_two']; ?><span id="retired_<?php echo $this->_var['goods_return']['rec_id']; ?>" name="retired">1</span><?php echo $this->_var['lang']['jian']; ?>)</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="return_div" ectype="return_div" style="display:none;">
                                    <div class="spec_div" id="spec_<?php echo $this->_var['goods_return']['rec_id']; ?>" style="display:none"></div>
                                    <div class="spec_list" id="splist_<?php echo $this->_var['goods_return']['rec_id']; ?>" style="display:none"></div>
                                    <div name="type_box2" class="type_box2" id="changeid_<?php echo $this->_var['goods_return']['rec_id']; ?>">
                                        <div class="return_sm">(<?php echo $this->_var['lang']['return_one']; ?><span><?php echo $this->_var['goods_return']['goods_number']; ?></span><?php echo $this->_var['lang']['change_two']; ?><span id="retired1_<?php echo $this->_var['goods_return']['rec_id']; ?>">1</span><?php echo $this->_var['lang']['jian']; ?>)</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="item item1">
                            <div class="label"><?php echo $this->_var['lang']['Application_credentials']; ?>：</div>
                            <div class="value">
                                 <input name="credentials" type="checkbox" value="" class="ui-checkbox" id="credentials"/>
                                 <label for="credentials" class="ui-label"><?php echo $this->_var['lang']['has_Test_Report']; ?></label>
                            </div>
                        </div>
                        <div class="item">
                            <div class="label"><em>*</em><?php echo $this->_var['lang']['return_reason']; ?>：</div>
                            <div class="value">
                                <span class="cause_select">
                                <select name="parent_id" id="cause_<?php echo $this->_var['goods_return']['rec_id']; ?>" onchange="selectCause(this.value ,<?php echo $this->_var['goods_return']['rec_id']; ?>)">
                                <option value="0"><?php echo $this->_var['lang']['please_select']; ?></option>
                                <?php echo $this->_var['cause_list']; ?>
                                </select>
                                </span>
                                <span id="children_<?php echo $this->_var['goods_return']['rec_id']; ?>" class="cause_select"></span>
                            </div>
                        </div>
                        <div class="item">
                            <div class="label"><em>*</em><?php echo $this->_var['lang']['problem_desc']; ?>：</div>
                            <div class="value"><textarea cols="40" class="text_desc" rows="4" name="return_brief"></textarea></div>
                        </div>
                        <div class="item">
                            <div class="label"><?php echo $this->_var['lang']['pic_info']; ?>：</div>
                            <div class="value">
                                <div class="upload_img">
                                    <div class="SWFUpload"><input type="button" id="uploadbutton" class="button" value="" /></div>
                                    <?php echo $this->_var['lang']['pic_info_one']; ?>
                                    <div class="up_img return_images"<?php if (! $this->_var['img_list']): ?> style="display:none;"<?php endif; ?>>
                                        <div class="mscoll">
                                            <a id="scollUp" class="mleft prev"><i class="iconfont icon-left"></i></a>
                                            <div class="mslist">
                                                <ul class="img-list-li">
                                                    <?php $_from = $this->_var['img_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'img');$this->_foreach['return'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['return']['total'] > 0):
    foreach ($_from AS $this->_var['img']):
        $this->_foreach['return']['iteration']++;
?>
                                                    <li>
                                                        <a href="<?php echo $this->_var['img']['img_file']; ?>" target="_blank"><img class="err-product" width="60" height="60" src="<?php echo $this->_var['img']['img_file']; ?>" /></a>
                                                    </li>
                                                    <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
                                                </ul>
                                            </div>
                                            <a id="scollDown" class="mright next"><i class="iconfont icon-right"></i></a>
                                        </div>
                                        <a class="apply_goods_return clear_pictures" href="javascript:void(0);"><?php echo $this->_var['lang']['Empty_picture']; ?></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div ectype="return-type">
                            <div class="item">
                                <div class="label"><em>*</em><?php echo $this->_var['lang']['label_address']; ?>：</div>
                                <div class="value">
                                    <div class="address" ectype="regionLinkage">
                                        <dl class="mod-select mod-select-small" ectype="smartdropdown">
                                            <dt>
                                                <span class="txt" ectype="txt"><?php echo $this->_var['lang']['please_select']; ?><?php echo $this->_var['name_of_region']['0']; ?></span>
                                                <input type="hidden" value="<?php echo $this->_var['consignee']['country']; ?>" name="country">
                                            </dt>
                                            <dd ectype="layer">
                                                <?php $_from = $this->_var['country_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'country');if (count($_from)):
    foreach ($_from AS $this->_var['country']):
?>
                                                <div class="option" data-value="<?php echo $this->_var['country']['region_id']; ?>" data-text="<?php echo $this->_var['country']['region_name']; ?>" ectype="ragionItem" data-type="1"><?php echo $this->_var['country']['region_name']; ?></div>
                                                <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
                                            </dd>
                                        </dl>
                                        <dl class="mod-select mod-select-small" ectype="smartdropdown">
                                            <dt><span class="txt" ectype="txt"><?php echo $this->_var['lang']['please_select']; ?><?php echo $this->_var['name_of_region']['1']; ?></span><input type="hidden" value="<?php echo $this->_var['consignee']['province']; ?>" ectype="ragionItem"name="province"></dt>
                                            <dd ectype="layer">
                                                <div class="option" data-value="0"><?php echo $this->_var['lang']['please_select']; ?><?php echo $this->_var['name_of_region']['1']; ?></div>
                                                <?php $_from = $this->_var['province_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'province_0_71028000_1507431355');if (count($_from)):
    foreach ($_from AS $this->_var['province_0_71028000_1507431355']):
?>
                                                <div class="option" data-value="<?php echo $this->_var['province_0_71028000_1507431355']['region_id']; ?>" data-text="<?php echo $this->_var['province_0_71028000_1507431355']['region_name']; ?>" data-type="2" ectype="ragionItem"><?php echo $this->_var['province_0_71028000_1507431355']['region_name']; ?></div>
                                                <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
                                            </dd>
                                        </dl>
                                        <dl class="mod-select mod-select-small" ectype="smartdropdown">
                                            <dt><span class="txt" ectype="txt"><?php echo $this->_var['lang']['please_select']; ?><?php echo $this->_var['name_of_region']['2']; ?></span><input type="hidden" value="<?php echo $this->_var['consignee']['city']; ?>" name="city" ></dt>
                                            <dd ectype="layer">
                                                <div class="option" data-value="0"><?php echo $this->_var['lang']['please_select']; ?><?php echo $this->_var['name_of_region']['2']; ?></div>
                                                <?php $_from = $this->_var['city_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'city');if (count($_from)):
    foreach ($_from AS $this->_var['city']):
?>
                                                <div class="option" data-value="<?php echo $this->_var['city']['region_id']; ?>" data-type="3" data-text="<?php echo $this->_var['city']['region_name']; ?>" ectype="ragionItem"><?php echo $this->_var['city']['region_name']; ?></div>
                                                <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
                                            </dd>
                                        </dl>
                                        <dl class="mod-select mod-select-small" ectype="smartdropdown" style="display:none">
                                            <dt><span class="txt" ectype="txt"><?php echo $this->_var['lang']['please_select']; ?><?php echo $this->_var['name_of_region']['3']; ?></span><input type="hidden" value="<?php echo $this->_var['consignee']['district']; ?>" name="district"></dt>
                                            <dd ectype="layer">
                                                <div class="option" data-value="0"><?php echo $this->_var['lang']['please_select']; ?><?php echo $this->_var['name_of_region']['3']; ?></div>
                                                <?php $_from = $this->_var['district_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'district');if (count($_from)):
    foreach ($_from AS $this->_var['district']):
?>
                                                <div class="option" data-value="<?php echo $this->_var['district']['region_id']; ?>" data-type="4" data-text="<?php echo $this->_var['district']['region_name']; ?>" ectype="ragionItem"><?php echo $this->_var['district']['region_name']; ?></div>
                                                <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
                                            </dd>
                                        </dl>
                                        <dl class="mod-select mod-select-small" ectype="smartdropdown" style="display:none">
                                            <dt><span class="txt" ectype="txt"><?php echo $this->_var['lang']['please_select']; ?><?php echo $this->_var['name_of_region']['3']; ?></span><input type="hidden" value="<?php echo $this->_var['consignee']['street']; ?>" name="street"></dt>
                                            <dd ectype="layer">
                                                <div class="option" data-value="0"><?php echo $this->_var['lang']['please_select']; ?><?php echo $this->_var['name_of_region']['3']; ?></div>
                                                <?php $_from = $this->_var['street_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'street');if (count($_from)):
    foreach ($_from AS $this->_var['street']):
?>
                                                <div class="option" data-value="<?php echo $this->_var['street']['region_id']; ?>" data-type="5" data-text="<?php echo $this->_var['street']['region_name']; ?>" ectype="ragionItem"><?php echo $this->_var['street']['region_name']; ?></div>
                                                <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
                                            </dd>
                                        </dl>
                                    </div>
                                    <div class="address_xq">
                                        <input type="text" class="text_item"  name="return_address" value="<?php echo $this->_var['consignee']['address']; ?>" size="42"/>
                                    </div>
                                </div>
                            </div>
                            <div class="item">
                                <div class="label"><em>*</em><?php echo $this->_var['lang']['Contact_name']; ?>：</div>
                                <div class="value">
                                    <input type="text" class="text_item"  name="addressee" value="<?php echo $this->_var['consignee']['consignee']; ?>" size="42"/>
                                    <input type="hidden" name="hid1" value="<?php echo $this->_var['consignee']['consignee']; ?>"/>
                                </div>
                            </div>
                            <div class="item">
                                <div class="label"><em>*</em><?php echo $this->_var['lang']['label_mobile']; ?>：</div>
                                <div class="value">
                                    <input type="text" class="text_item"  name="mobile" value="<?php echo $this->_var['consignee']['mobile']; ?>" size="42"/>
                                </div>
                            </div>
                            <div class="item">
                                <div class="label"><?php echo $this->_var['lang']['email_user']; ?>：</div>
                                <div class="value">
                                    <input type="text" class="text_item" name="code" value="<?php echo $this->_var['consignee']['zipcode']; ?>" size="42"/>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="label"><?php echo $this->_var['lang']['type']['0']; ?>：</div>
                            <div class="value">
                                <textarea cols="40" class="text_area" rows="4" name="return_remark"></textarea>
                            </div>
                        </div>
                        <div class="item">
                            <div class="label">&nbsp;</div>
                            <div class="value">
                            	<input type="hidden" name="chargeoff_status" value="<?php echo $this->_var['order']['chargeoff_status']; ?>" />
                                <input type="submit" value="<?php echo $this->_var['lang']['submit_goods']; ?>" class="sc-btn btn30 sc-redBg-btn" />
                                <input type="hidden" name="act" value="submit_return" />
                                <input type="hidden" name="rec_id" value="<?php echo $this->_var['goods_return']['rec_id']; ?>" />
                            </div>
                        </div>
                        <?php else: ?>
                        <div class="no_records">
                            <i class="no_icon_two"></i>
                            <div class="no_info"><h3>暂不支持退换货</h3></div>
                        </div>
                        <?php endif; ?>
                    </div>
                </form>
            </div>
        </div>  
        <?php endif; ?>
          
		
		
		
		<?php if ($this->_var['action'] == 'auction_list'): ?>
		<div class="user-mod">
			<div class="user-title">
                <h2>我的拍卖</h2>
                <ul class="tabs">
					<li <?php if ($this->_var['action'] == 'auction_list'): ?>class="active"<?php endif; ?>><a href="user.php?act=auction_list">拍卖列表</a></li>
                    <li <?php if ($this->_var['action'] == 'auction'): ?>class="active"<?php endif; ?>><a href="user.php?act=auction">拍卖订单</a></li>
                </ul>
            </div>
			<div class="user-title">
                <ul class="tabs">
                    <li class="active"><a href="">全部拍卖(<?php echo $this->_var['all_auction']; ?>)</a></li>
                    <li class="user-count3" onclick="get_AuctionSearch('is_going', '<?php echo $this->_var['action']; ?>', 'is_going','','.user-count3')">
						<a href="javascript:void(0);">进行中(<?php echo $this->_var['is_going']; ?>)</a>
						<input name="is_going" id="is_going" type="hidden" value="1" />
                    </li>
                    <li class="user-count1" onclick="get_AuctionSearch('is_finished', '<?php echo $this->_var['action']; ?>', 'is_finished','','.user-count1')">
						<a href="javascript:void(0);">已结束(<?php echo $this->_var['is_finished']; ?>)</a>
						<input name="is_finished" id="is_finished" type="hidden" value="3" />
                    </li>
                </ul>
            </div>
			<div class="comment-list-warp clearfix">
                <div class="user-order-list" id="user-auction-list">
					<?php echo $this->fetch('library/user_auction_list.lbi'); ?>
                </div>
            </div>
		</div>
		<?php endif; ?>
		

		
        <?php if ($this->_var['action'] == 'auction' || $this->_var['action'] == 'auction_order_recycle'): ?>
        <div class="user-mod">
			<div class="user-title">
                <h2>我的拍卖</h2>
                <ul class="tabs">
					<li <?php if ($this->_var['action'] == 'auction_list'): ?>class="active"<?php endif; ?>><a href="user.php?act=auction_list">拍卖列表</a></li>
                    <li <?php if ($this->_var['action'] == 'auction'): ?>class="active"<?php endif; ?>><a href="user.php?act=auction">拍卖订单</a></li>
                </ul>
            </div>
            <div class="user-title">
                <ul class="tabs">
                    <li class="active"><a href="">全部订单(<?php echo $this->_var['allorders']; ?>)</a></li>
                    <li class="user-count3" onclick="get_OrderSearch('to_unconfirmed', '<?php echo $this->_var['action']; ?>', 'toBe_unconfirmed','','.user-count3')">
                    <a href="javascript:void(0);"><?php echo $this->_var['lang']['cs']['0']; ?>(<?php echo $this->_var['unconfirmed']; ?>)</a>
                    <input name="to_unconfirmed" id="to_unconfirmed" type="hidden" value="0" />
                    </li>
                    <li class="user-count1" onclick="get_OrderSearch('payId', '<?php echo $this->_var['action']; ?>', 'toBe_pay','','.user-count1')">
                    <a href="javascript:void(0);"><?php echo $this->_var['lang']['cs']['100']; ?>(<?php echo $this->_var['pay_count']; ?>)</a>
                    <input name="toBe_pay" id="payId" type="hidden" value="100" />
                    </li>
                    <li class="user-count2" onclick="get_OrderSearch('to_confirm_order', '<?php echo $this->_var['action']; ?>', 'toBe_confirmed','','.user-count2')">
                    <a href="javascript:void(0);">待收货(<?php echo $this->_var['to_confirm_order']; ?>)</a>
                    <input name="to_confirm_order" id="to_confirm_order" type="hidden" value="103" />
                    </li>
                    <li class="user-count4" onclick="get_OrderSearch('to_finished', '<?php echo $this->_var['action']; ?>', 'toBe_finished','','.user-count4')">
                    <a href="javascript:void(0);"><?php echo $this->_var['lang']['cs']['102']; ?>(<?php echo $this->_var['to_finished']; ?>)</a>
                    <input name="to_finished" id="to_finished" type="hidden" value="102" />
                    </li>
                </ul>
            </div>
            <div class="user-list-title clearfix">
                <div class="user-list-filter">
                    <div id="order_status" class="imitate_select w120 mr10">
                        <div class="cite"><span><?php echo $this->_var['lang']['all_status']; ?></span><i class="iconfont icon-down"></i></div>
                        <ul>
                            <li id="order_status_-1"><a href="javascript:void(0);" data-idtxt="status_list" data-action="<?php echo $this->_var['action']; ?>" data-type="order_status" data-id="-1" data-value='-1'><?php echo $this->_var['lang']['all_status']; ?></a></li>
                            <?php $_from = $this->_var['status_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('key', 'list');if (count($_from)):
    foreach ($_from AS $this->_var['key'] => $this->_var['list']):
?>
                            <li id="order_status_<?php echo $this->_var['key']; ?>"><a href="javascript:void(0);" data-idtxt="status_list" data-action="<?php echo $this->_var['action']; ?>" data-type="order_status" data-id="<?php echo $this->_var['key']; ?>" data-value='<?php echo $this->_var['key']; ?>'><?php echo $this->_var['list']; ?></a></li>
                            <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
                        </ul>
                        <input name="order_status_list" type="hidden" value="-1" id="order_status_val">
                    </div>
                    <div id="dateTime" class="imitate_select w120">
                        <div class="cite"><span><?php echo $this->_var['lang']['all_time']; ?></span><i class="iconfont icon-down"></i></div>
                        <ul>
                            <li id="time_allDate"><a href="javascript:void(0);" data-idtxt="submitDate" data-action="<?php echo $this->_var['action']; ?>" data-type="dateTime" data-id="allDate" data-value="allDate"><?php echo $this->_var['lang']['all_time']; ?></a></li>
                            <li id="time_today"><a href="javascript:void(0);" data-idtxt="submitDate" data-action="<?php echo $this->_var['action']; ?>" data-type="dateTime" data-id="today" data-value="today"><?php echo $this->_var['lang']['Today']; ?></a></li>
                            <li id="time_three_today"><a href="javascript:void(0);" data-idtxt="submitDate" data-action="<?php echo $this->_var['action']; ?>" data-type="dateTime" data-id="three_today" data-value="three_today"><?php echo $this->_var['lang']['three_today']; ?></a></li>
                            <li id="time_aweek"><a href="javascript:void(0);" data-idtxt="submitDate" data-action="<?php echo $this->_var['action']; ?>" data-type="dateTime" data-id="aweek" data-value="aweek"><?php echo $this->_var['lang']['aweek']; ?></a></li>
                            <li id="time_thismonth"><a href="javascript:void(0);" data-idtxt="submitDate" data-action="<?php echo $this->_var['action']; ?>" data-type="dateTime" data-id="thismonth" data-value="thismonth"><?php echo $this->_var['lang']['thismonth']; ?></a></li>
                        </ul>
                        <input name="order_submitDate" type="hidden" value="allDate" id="dateTime_val">
                    </div>
                </div>
                <form class="user-list-search">
                    <input type="text" id="ip_keyword" class="text" onkeydown="javascript:if(event.keyCode==13) OrderSearch('ip_keyword');" onblur="if (this.value=='') this.value=this.defaultValue; this.style.color='#999'" onfocus="if (this.value==this.defaultValue)this.value='';this.style.color='#666'" placeholder="<?php echo $this->_var['lang']['search_oreder_user']; ?>" name="" style="color:#999;"/>
                    <button type="button" onclick="get_OrderSearch('ip_keyword', '<?php echo $this->_var['action']; ?>', 'text')"><i class="iconfont icon-search"></i></button>
                </form>
            </div>
            <div id="user_order_list">
            <?php if (! $this->_var['order_type']): ?>
            <?php echo $this->fetch('library/user_order_list.lbi'); ?>
            <?php endif; ?>
            </div>
        </div>
        <?php endif; ?> 
        

		
		<?php if ($this->_var['action'] == 'snatch_list'): ?>
		<div class="user-mod">
			<div class="user-title">
				<h2>我的夺宝</h2>
                <ul class="tabs">
                    <li class="active"><a href="">全部夺宝(<?php echo empty($this->_var['all_snatch']) ? '0' : $this->_var['all_snatch']; ?>)</a></li>
                    <li class="user-count3" onclick="get_SnatchSearch('is_going', '<?php echo $this->_var['action']; ?>', 'is_going','','.user-count3')">
						<a href="javascript:void(0);">进行中(<?php echo $this->_var['is_going']; ?>)</a>
						<input name="is_going" id="is_going" type="hidden" value="1" />
                    </li>
                    <li class="user-count1" onclick="get_SnatchSearch('is_finished', '<?php echo $this->_var['action']; ?>', 'is_finished','','.user-count1')">
						<a href="javascript:void(0);">已结束(<?php echo $this->_var['is_finished']; ?>)</a>
						<input name="is_finished" id="is_finished" type="hidden" value="3" />
                    </li>
                </ul>
            </div>
			<div class="comment-list-warp clearfix">
                <div class="user-order-list" id="user-snatch-list">
					<?php echo $this->fetch('library/user_snatch_list.lbi'); ?>
                </div>
            </div>
		</div>
		<?php endif; ?>
		
		
        
        
        <?php if ($this->_var['action'] == 'coupons'): ?>
        <div class="user-mod" ectype="tabSection">
            <div class="user-title">
                <h2><?php echo $this->_var['lang']['Coupon_list']; ?></h2>
                <ul class="tabs" ectype="tabs">
                    <li class="active"><a href="javascript:void(0);"><?php echo $this->_var['lang']['not_use']; ?>(<?php echo $this->_var['no_use_count']; ?>)</a></li>
                    <li><a href="javascript:void(0);"><?php echo $this->_var['lang']['had_use']; ?>(<?php echo $this->_var['yes_use_count']; ?>)</a></li>
                    <li><a href="javascript:void(0);"><?php echo $this->_var['lang']['overdue']; ?>(<?php echo $this->_var['yes_time_count']; ?>)</a></li>
                    <li><a href="javascript:void(0);"><?php echo $this->_var['lang']['About_expire']; ?>(<?php echo $this->_var['no_time_count']; ?>)</a></li>
                </ul>
            </div>
            <div class="user-coupons-warp" ectype="tabContent">
                <div id="coupons_list0" class="coupons_content_list">
                    <div class="coupons-items">
                        <?php if ($this->_var['no_use']): ?>
                        <?php $_from = $this->_var['no_use']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'vo');$this->_foreach['cou'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['cou']['total'] > 0):
    foreach ($_from AS $this->_var['vo']):
        $this->_foreach['cou']['iteration']++;
?>
                        <div class="coupons-item <?php if ($this->_foreach['cou']['iteration'] % 2 == 0): ?>coupons-item-double<?php endif; ?>" >
                            <div class="c-type">
                                <i class="i-left"></i>
                                <div class="c-t-cont">
                                    <div class="c-t-c-top">
                                        <strong><em>￥</em><?php echo $this->_var['vo']['cou_money']; ?></strong>
                                        <span><?php echo $this->_var['lang']['Consumption_full']; ?><?php echo $this->_var['vo']['cou_man']; ?><?php echo $this->_var['lang']['yuan']; ?>&nbsp;<?php echo $this->_var['lang']['keyong']; ?></span>
                                    </div>
                                    <div class="c-t-c-bot">
                                        <p><?php echo $this->_var['lang']['Platform_limit']; ?>：
                                            <?php if ($this->_var['vo']['store_name']): ?>
                                            <?php echo $this->_var['vo']['store_name']; ?>
                                            <?php else: ?>
                                            <?php echo $this->_var['lang']['whole_platform']; ?>
                                            <?php endif; ?>
                                        </p>
                                        <p><?php echo $this->_var['vo']['cou_start_time_date']; ?> ~ <?php echo $this->_var['vo']['cou_end_time_date']; ?></p>
                                    </div>
                                </div>
                                <?php if ($this->_var['will_passed']): ?>
                                <i class="i-right"></i>
                                <i class="i-soon">即将到期</i>
                                <?php endif; ?>
                            </div>
                            <?php if ($this->_var['is_used']): ?>
                            <div class="c-msg">
                                <span class="not">已使用</span>
                            </div>
                            <?php else: ?>
                            <div class="c-msg">
                                <a href="search.php?cou_id=<?php echo $this->_var['vo']['cou_id']; ?>&user_cou=1">
                                    <span class="lj"><?php echo $this->_var['lang']['Immediate_use']; ?></span>
                                    <i class="iconfont icon-down"></i>
                                </a>
                            </div>
                            <?php endif; ?>
                        </div>
                        <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
                        <?php else: ?>
                        <div class="no_records">
                            <i class="no_icon_two"></i>
                            <div class="no_info"><h3><?php echo $this->_var['lang']['no_coupons_keyong']; ?></h3></div>
                        </div>
                        <?php endif; ?>
                    </div>
                </div>
                <div id="coupons_list1" style="display: none;" class="coupons_content_list">
                    <div class="coupons-items coupons-item-disabled">
                        <?php if ($this->_var['yes_use']): ?>
                        <?php $_from = $this->_var['yes_use']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'vo');$this->_foreach['cou'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['cou']['total'] > 0):
    foreach ($_from AS $this->_var['vo']):
        $this->_foreach['cou']['iteration']++;
?>
                        <div class="coupons-item">
                            <div class="c-type">
                                <i class="i-left"></i>
                                <div class="c-t-cont">
                                    <div class="c-t-c-top">
                                        <strong><em>￥</em><?php echo $this->_var['vo']['cou_money']; ?></strong>
                                        <span><?php echo $this->_var['lang']['Consumption_full']; ?><?php echo $this->_var['vo']['cou_man']; ?><?php echo $this->_var['lang']['yuan']; ?>&nbsp;<?php echo $this->_var['lang']['keyong']; ?></span>
                                    </div>
                                    <div class="c-t-c-bot">
                                        <p><?php echo $this->_var['lang']['Platform_limit']; ?>：
                                            <?php if ($this->_var['vo']['store_name']): ?>
                                            <?php echo $this->_var['lang']['xian']; ?><?php echo $this->_var['vo']['store_name']; ?>
                                            <?php else: ?>
                                            <?php echo $this->_var['lang']['whole_platform']; ?>
                                            <?php endif; ?>
                                        </p>
                                        <p><?php echo $this->_var['vo']['cou_start_time_date']; ?> ~ <?php echo $this->_var['vo']['cou_end_time_date']; ?></p>
                                    </div>
                                </div>
                                <?php if ($this->_var['will_passed']): ?>
                                <i class="i-right"></i>
                                <i class="i-soon">即将到期</i>
                                <?php endif; ?>
                            </div>
                            <?php if ($this->_var['is_used']): ?>
                            <div class="c-msg">
                                <span class="not">已使用</span>
                            </div>
                            <?php else: ?>
                            <div class="c-msg">
                                <span class="not"><?php echo $this->_var['lang']['had_use']; ?></span>
                            </div>
                            <?php endif; ?>
                        </div>
                        <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
                        <?php else: ?>
                        <div class="no_records">
                            <i class="no_icon_two"></i>
                            <div class="no_info"><h3><?php echo $this->_var['lang']['no_coupons_use']; ?></h3></div>
                        </div>
                        <?php endif; ?>
                    </div>
                </div>
                <div id="coupons_list2" style="display: none;" class="coupons_content_list">
                    <div class="coupons-items">
                        <?php if ($this->_var['yes_time']): ?>
                        <?php $_from = $this->_var['yes_time']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'vo');$this->_foreach['cou'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['cou']['total'] > 0):
    foreach ($_from AS $this->_var['vo']):
        $this->_foreach['cou']['iteration']++;
?>
                        <div class="coupons-item coupons-item-disabled" >
                            <div class="c-type">
                                <i class="i-left"></i>
                                <div class="c-t-cont">
                                    <div class="c-t-c-top">
                                        <strong><em>￥</em><?php echo $this->_var['vo']['cou_money']; ?></strong>
                                        <span><?php echo $this->_var['lang']['Consumption_full']; ?><?php echo $this->_var['vo']['cou_man']; ?><?php echo $this->_var['lang']['yuan']; ?>&nbsp;<?php echo $this->_var['lang']['keyong']; ?></span>
                                    </div>
                                    <div class="c-t-c-bot">
                                        <p>
                                            <?php echo $this->_var['lang']['Platform_limit']; ?>：
                                            <?php if ($this->_var['vo']['store_name']): ?>
                                            <?php echo $this->_var['lang']['xian']; ?><?php echo $this->_var['vo']['store_name']; ?>
                                            <?php else: ?>
                                            <?php echo $this->_var['lang']['whole_platform']; ?>
                                            <?php endif; ?>
                                        </p>
                                        <p><?php echo $this->_var['vo']['cou_start_time_date']; ?> ~ <?php echo $this->_var['vo']['cou_end_time_date']; ?></p>
                                    </div>
                                </div>
                                <?php if ($this->_var['will_passed']): ?>
                                <i class="i-right"></i>
                                <i class="i-soon">即将到期</i>
                                <?php endif; ?>
                            </div>
                            <?php if ($this->_var['is_used']): ?>
                            <div class="c-msg">
                                <span class="not">已使用</span>
                            </div>
                            <?php else: ?>
                            <div class="c-msg">
                                <span class="not"><?php echo $this->_var['lang']['overdue']; ?></span>
                            </div>
                            <?php endif; ?>
                        </div>
                        <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
                        <?php else: ?>
                        <div class="no_records">
                            <i class="no_icon_two"></i>
                            <div class="no_info"><h3><?php echo $this->_var['lang']['no_coupons_over']; ?></h3></div>
                        </div>
                        <?php endif; ?>
                    </div>
                </div>
                <div id="coupons_list3" style="display: none;" class="coupons_content_list">
                    <div class="coupons-items <?php if ($this->_foreach['cou']['iteration'] % 2 == 0): ?>coupons-item-double<?php endif; ?>">
                        <?php if ($this->_var['no_time']): ?>
                        <?php $_from = $this->_var['no_time']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'vo');$this->_foreach['cou'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['cou']['total'] > 0):
    foreach ($_from AS $this->_var['vo']):
        $this->_foreach['cou']['iteration']++;
?>
                        <div class="coupons-item <?php if ($this->_foreach['cou']['iteration'] % 2 == 0): ?>coupons-item-double<?php endif; ?>" >
                            <div class="c-type">
                                <i class="i-left"></i>
                                <div class="c-t-cont">
                                    <div class="c-t-c-top">
                                        <strong><em>￥</em><?php echo $this->_var['vo']['cou_money']; ?></strong>
                                        <span><?php echo $this->_var['lang']['Consumption_full']; ?><?php echo $this->_var['vo']['cou_man']; ?><?php echo $this->_var['lang']['yuan']; ?>&nbsp;<?php echo $this->_var['lang']['keyong']; ?></span>
                                    </div>
                                    <div class="c-t-c-bot">
                                        <p><?php echo $this->_var['lang']['Platform_limit']; ?>：
                                            <?php if ($this->_var['vo']['store_name']): ?>
                                            <?php echo $this->_var['lang']['xian']; ?><?php echo $this->_var['vo']['store_name']; ?>
                                            <?php else: ?>
                                            <?php echo $this->_var['lang']['whole_platform']; ?>
                                            <?php endif; ?>
                                        </p>
                                        <p><?php echo $this->_var['vo']['cou_start_time_date']; ?> ~ <?php echo $this->_var['vo']['cou_end_time_date']; ?></p>
                                    </div>
                                </div>
                                <?php if ($this->_var['will_passed']): ?>
                                <i class="i-right"></i>
                                <i class="i-soon">即将到期</i>
                                <?php endif; ?>
                            </div>
                            <?php if ($this->_var['is_used']): ?>
                            <div class="c-msg">
                                <span class="not">已使用</span>
                            </div>
                            <?php else: ?>
                            <div class="c-msg">
                                <a href="search.php?cou_id=<?php echo $this->_var['vo']['cou_id']; ?>&user_cou=1">
                                    <span class="lj"><?php echo $this->_var['lang']['Immediate_use']; ?></span>
                                    <i class="iconfont icon-down"></i>
                                </a>
                            </div>
                            <?php endif; ?>
                        </div>
                        <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
                        <?php else: ?>
                        <div class="no_records">
                            <i class="no_icon_two"></i>
                            <div class="no_info"><h3><?php echo $this->_var['lang']['no_coupons_soon_over']; ?></h3></div>
                        </div>
                        <?php endif; ?>
                    </div>
                </div>				
            </div>
        </div>
        <?php endif; ?>
        

        
        <?php if ($this->_var['action'] == 'track_packages'): ?>
        <div class="user-mod">
            <div class="user-title">
                <h2><?php echo $this->_var['lang']['label_track_packages']; ?></h2>
            </div>
            <div class="user-order-list user-trackpack">
            <?php $_from = $this->_var['orders']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('key', 'item');if (count($_from)):
    foreach ($_from AS $this->_var['key'] => $this->_var['item']):
?>
                <dl class="item" data-orderId='<?php echo $this->_var['item']['order_id']; ?>'>
                    <dt class="item-t">
                        <div class="t-statu"><?php if ($this->_var['item']['shipping_status'] != ""): ?><?php echo $this->_var['item']['shipping_status']; ?><?php else: ?>&nbsp;<?php endif; ?></div>
                        <div class="t-info">
                            <span class="info-item"><?php echo $this->_var['lang']['order_number']; ?>：<?php echo $this->_var['item']['order_sn']; ?></span>
                            <span class="info-item"><?php echo $this->_var['lang']['Waybill_number']; ?>：<?php if ($this->_var['item']['invoice_no'] != ""): ?><?php echo $this->_var['item']['invoice_no']; ?><?php else: ?>&nbsp;<?php endif; ?></span>
                            <span class="info-item"><?php if ($this->_var['item']['shipping_name'] != ""): ?><?php echo $this->_var['item']['shipping_name']; ?><?php else: ?>&nbsp;<?php endif; ?></span>
                        </div>
                        <div class="t-right"><?php echo $this->_var['item']['formated_shipping_time']; ?></div>
                    </dt>
                    <dd class="item-c relative">
                        <div class="c-left">
                            <?php $_from = $this->_var['item']['goods']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'goods');$this->_foreach['goods'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['goods']['total'] > 0):
    foreach ($_from AS $this->_var['goods']):
        $this->_foreach['goods']['iteration']++;
?>
                            <div class="c-goods" ectype="c-goods" <?php if (($this->_foreach['goods']['iteration'] - 1) > 2): ?> style="display:none;"<?php endif; ?>>
                                <div class="c-img"><a href="<?php echo $this->_var['goods']['url']; ?>"><img src="<?php echo $this->_var['goods']['goods_thumb']; ?>" alt=""></a></div>
                                <div class="c-info">
                                    <div class="info-name"><a href="<?php echo $this->_var['goods']['url']; ?>"><?php echo $this->_var['goods']['goods_name']; ?></a></div>
                                    <div class="info-price"><b><?php echo $this->_var['goods']['goods_price']; ?></b><i>×</i><span><?php echo $this->_var['goods']['goods_number']; ?></span></div>
                                </div>
                            </div>
                            <?php $this->assign('goods_count',$this->_foreach['goods']['iteration']); ?>
                            <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
                            <?php if ($this->_var['goods_count'] > 3): ?>
                            <span class="ellipsis">......</span>
                            <a href="javascript:void(0);" class="order-prolist-more" ectype="opm">查看更多︾</a>
                            <?php endif; ?>
                        </div>
                        <div class="c-handle" ectype="track-packages-btn">
                            <a href="javascript:void(0)" class="sc-btn"><i class="iconfont icon-truck"></i>跟踪</a>
                            <div class="comment-box" ectype="track-packages-info">
                                <i class="box-i"></i>
                                <?php if ($this->_var['item']['invoice_no']): ?>
                                <div class="conmment-box-content">
                                    <div class="cont" id="retData_<?php echo $this->_var['item']['order_id']; ?>">
                                        
                                    </div>
                                </div>
                                <?php endif; ?>
                            </div>
                        </div>
                        <span id="invoice_no_<?php echo $this->_var['item']['order_id']; ?>" style="display:none"><?php echo $this->_var['item']['invoice_no']; ?></span>
                        <span id="shipping_name_<?php echo $this->_var['item']['order_id']; ?>" style="display:none"><?php echo $this->_var['item']['shipping_name']; ?></span>
                    </dd>
                </dl>
            <?php endforeach; else: ?>
                <div class="no_records">
                    <i class="no_icon_two"></i>
                    <div class="no_info"><h3><?php 
$k = array (
  'name' => 'get_page_no_records',
  'filename' => $this->_var['filename'],
  'act' => $this->_var['action'],
);
echo $this->_echash . $k['name'] . '|' . serialize($k) . $this->_echash;
?></h3></div>
                </div>
            <?php endif; unset($_from); ?><?php $this->pop_vars();; ?>
            </div>
        </div>
        <?php endif; ?>
        
        
        
        <?php if ($this->_var['action'] == 'account_log' || $this->_var['action'] == 'account_detail'): ?>
        <div class="user-mod">
            <div class="user-account-warp">
                
                <div class="user-title">
                    <h2>资金管理</h2>
                </div>
                <div class="account-main account-not">
                    <div class="account-price"><strong>账户余额：</strong><span class="a-price"><?php echo $this->_var['info']['surplus']; ?></span></div>
                    <div class="account-btn">
                        <a href="user.php?act=account_deposit" class="sc-btn sc-redBg-btn">在线充值</a>
                        <a href="user.php?act=<?php if ($this->_var['validate_info']['real_name']): ?>account_raply<?php else: ?>account_safe&type=real_name&step=first<?php endif; ?>" class="sc-btn">申请提现</a>
                    </div>

                    <div class="a-m-bot">
                        <div class="user-frame-items">
                            <div class="item">
								<a href="user.php?act=bonus">
									<span>我的红包</span>
									<span class="b-price"><?php echo $this->_var['info']['bonus_count']; ?></span>
								</a>
                            </div>
                            <div class="item">
								<a href="user.php?act=coupons">
									<span>我的优惠券</span>
									<span class="b-price"><?php echo $this->_var['coupons']['num']; ?></span>
								</a>
                            </div>
                            <div class="item">
								<a href="user.php?act=value_card">
									<span>我的储值卡</span>
									<span class="b-price"><?php echo $this->_var['value_card']['num']; ?></span>
								</a>
                            </div>
                            <div class="item">
								<span>会员积分</span>
								<span class="b-price"><?php echo $this->_var['info']['integral']; ?></span>
                            </div>
                        </div>
                    </div>
                    <?php if ($this->_var['action'] == 'account_log'): ?>
                    <div class="user-prompt mt50">
                        <div class="tit"><span>资金管理注意事项</span><i class="iconfont icon-down"></i></div>
                        <div class="info">
                            <p>1 请先绑定银行卡，开通资金管理</p>
                            <p>2 账户余额是您在本网站可用于支付的金额，您可在线充值、申请提现</p>
                        </div>
                    </div>
                    <?php endif; ?>
                    <div class="user-title mt30">
                        <ul class="tabs">
                            <li <?php if ($this->_var['action'] == 'account_log'): ?>class="active"<?php endif; ?>><a href="user.php?act=account_log">申请记录</a></li>
                            <li <?php if ($this->_var['action'] == 'account_detail'): ?>class="active"<?php endif; ?>><a href="user.php?act=account_detail">账户明细</a></li>
                        </ul>
                    </div>
                    <?php if ($this->_var['action'] == 'account_log'): ?>
                    <div class="account-open-list">
                        <table class="user-table user-table-account">
                            <colgroup>
                                <col width="140">
                                <col width="120">
                                <col width="120">
                                <col width="160">
                                <col width="160">
                                <col width="120">
                                <col>
                            </colgroup>
                            <thead>
                                <tr>
                                    <th><?php echo $this->_var['lang']['info']; ?></th>
                                    <th class="tl"><?php echo $this->_var['lang']['money']; ?></th>
                                    <th class="tl"><?php echo $this->_var['lang']['payment_method']; ?></th>
                                    <th class="tl"><?php echo $this->_var['lang']['process_notic']; ?></th>
                                    <th class="tl"><?php echo $this->_var['lang']['admin_notic']; ?></th>
                                    <th><?php echo $this->_var['lang']['is_paid']; ?></th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php $_from = $this->_var['account_log']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'item');if (count($_from)):
    foreach ($_from AS $this->_var['item']):
?>
                                <tr>
                                    <td><?php echo $this->_var['item']['add_time']; ?><br><div class="ftx-01"><?php echo $this->_var['item']['type']; ?></div></td>
                                    <td><?php echo $this->_var['item']['amount']; ?></td>
                                    <td><?php echo empty($this->_var['item']['payment']) ? 'N/A' : $this->_var['item']['payment']; ?></td>
                                    <td><?php echo $this->_var['item']['short_user_note']; ?></td>
                                    <td><?php echo $this->_var['item']['short_admin_note']; ?></td>
                                    <td class="tc">
                                        <!--<a href="#" class="sc-btn">付款</a>
                                        <a href="#" class="sc-btn">取消</a>-->
                                        <?php echo $this->_var['item']['pay_status']; ?>
                                    </td>
                                </tr>
                            <?php endforeach; else: ?>
                                <tr>
                                    <td colspan="6"><?php echo $this->_var['lang']['account_log_empty']; ?></td>
                                </tr>
                            <?php endif; unset($_from); ?><?php $this->pop_vars();; ?>
                            </tbody>
                        </table>
                    </div>
                    <?php endif; ?>
                    
                    <?php if ($this->_var['action'] == 'account_detail'): ?>
                    <div class="account-open-list">
                        <table class="user-table user-table-account">
                            <colgroup>
                                <col width="140">
                                <col width="120">
                                <col width="120">
                                <col width="160">
                                <col>
                            </colgroup>
                            <thead>
                                <tr>
                                    <th><?php echo $this->_var['lang']['process_time']; ?></th>
                                    <th class="tl"><?php echo $this->_var['lang']['surplus_pro_type']; ?></th>
                                    <th class="tl"><?php echo $this->_var['lang']['money']; ?></th>
                                    <th class="tl"><?php echo $this->_var['lang']['change_desc']; ?></th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php $_from = $this->_var['account_log']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'item');if (count($_from)):
    foreach ($_from AS $this->_var['item']):
?>
                                <tr>
                                    <td><?php echo $this->_var['item']['change_time']; ?></td>
                                    <td><?php echo $this->_var['item']['type']; ?></td>
                                    <td><?php echo $this->_var['item']['amount']; ?></td>
                                    <td><?php echo $this->_var['item']['short_change_desc']; ?></td>
                                </tr>
                            <?php endforeach; else: ?>
                                <tr>
                                    <td colspan="6"><?php echo $this->_var['lang']['account_log_empty']; ?></td>
                                </tr>
                            <?php endif; unset($_from); ?><?php $this->pop_vars();; ?>
                            </tbody>
                        </table>
                    </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
        <?php endif; ?>
        
        <?php if ($this->_var['action'] == "account_deposit"): ?>
        <div class="user-mod">
            <div class="user-account-warp">
                <div class="user-title">
                    <h2>在线充值</h2>
                </div>
                <form name="formSurplus" method="post" action="user.php" onSubmit="return submitSurplus()">
                <div class="account-main account-deposit">
                    <div class="user-items">
                        <div class="item">
                            <div class="label">账户余额：</div>
                            <div class="value"><span class="txt-lh ftx-01"><?php echo $this->_var['user_info']['surplus']; ?></span></div>
                        </div>
                        <div class="item">
                            <div class="label"><?php echo $this->_var['lang']['surplus_type_0']; ?>：</div>
                            <div class="value">
                                <input type="text" name="amount" class="text text-1" />
                                <span class="ts"><?php echo $this->_var['lang']['yuan']; ?></span>
                            </div>
                        </div>
                        <div class="item">
                            <div class="label"><?php echo $this->_var['lang']['payment']; ?>：</div>
                            <div class="value">
                                <?php $_from = $this->_var['payment']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('key', 'list');if (count($_from)):
    foreach ($_from AS $this->_var['key'] => $this->_var['list']):
?>
                                <div class="radio-item">
                                    <input type="radio" name="payment_id" class="ui-radio" value="<?php echo $this->_var['list']['pay_id']; ?>" id="payment-remittance_<?php echo $this->_var['list']['pay_id']; ?>" <?php if ($this->_var['key'] == 0): ?>checked<?php endif; ?> />
                                    <label for="payment-remittance_<?php echo $this->_var['list']['pay_id']; ?>" class="ui-radio-label"><?php echo $this->_var['list']['pay_name']; ?></label>
                                </div>
                                <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
                            </div>
                        </div>
                        <div class="item">
                            <div class="label"><?php echo $this->_var['lang']['process_notic']; ?>：</div>
                            <div class="value"><textarea name="user_note" class="textarea"></textarea></div>
                        </div>
                        <div class="item item-button">
                            <div class="label">&nbsp;</div>
                            <div class="value">
                                <input type="hidden" name="surplus_type" value="0" />
                                <input type="hidden" name="rec_id" value="<?php echo $this->_var['order']['id']; ?>" />
                                <input type="hidden" name="act" value="act_account" />
                                <input type="submit" class="sc-btn sc-redBg-btn" name="submit" value="<?php echo $this->_var['lang']['Determine_Recharge']; ?>" />
                            </div>
                        </div>
                    </div>
                </div>
                </form>
            </div>
        </div>
        <?php endif; ?>
        
        <?php if ($this->_var['action'] == "account_raply"): ?>		
        <div class="user-mod">
            <div class="user-account-warp">
                <div class="user-title">
                    <h2><?php echo $this->_var['lang']['Application_withdrawal']; ?></h2>
                </div>
                <form name="formSurplus" method="post" action="user.php" id="formSurplus">
                    <div class="user-items">
                        <div class="item">
                            <div class="label"><?php echo $this->_var['lang']['Real_name']; ?>：</div>
                            <div class="value"><span class="txt-lh"><?php echo $this->_var['validate_info']['real_name']; ?></span></div>
                        </div>
                        <div class="item">
                            <div class="label"><?php echo $this->_var['lang']['Current_balance_label']; ?>：</div>
                            <div class="value"><span class="txt-lh ftx-01"><?php echo $this->_var['user_info']['surplus']; ?><?php echo $this->_var['lang']['renmingni']; ?></span></div>
                        </div>
                        <div class="item">
                            <div class="label"><?php echo $this->_var['lang']['bank']; ?>：</div>
                            <div class="value"><span class="txt-lh"><?php echo $this->_var['validate_info']['bank_name']; ?></span></div>
                        </div>
                        <div class="item">
                            <div class="label"><?php echo $this->_var['lang']['bank_card']; ?>：</div>
                            <div class="value"><span class="txt-lh"><?php echo $this->_var['validate_info']['bank_card']; ?></span></div>
                        </div>
                        <div class="item">
                            <div class="label"><em class="red">*</em><?php echo $this->_var['lang']['repay_money']; ?>：</div>
                            <div class="value">
                                <input type="text" name="amount" class="text text-2" />
                                <span class="ts"><?php echo $this->_var['lang']['yuan']; ?><?php echo $this->_var['lang']['renmingni']; ?></span>
                                <div class="form_prompt"></div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="label"><?php echo $this->_var['lang']['process_notic']; ?>：</div>
                            <div class="value">
                                <textarea name="user_note" class="text text-2" style="height:100px; line-height:20px; padding-top:3px; padding-bottom:3px;"></textarea>
                            </div>
                        </div>
                        
                        <?php if ($this->_var['enabled_sms_signin']): ?>
                        <div class="item">
                            <div class="label"><em class="red">*</em><?php echo $this->_var['lang']['label_mobile']; ?>：</div>
                            <div class="value">
                                <span class="txt-lh ftx-01"><?php echo $this->_var['validate_info']['bank_mobile']; ?></span>
                                <input class="text text-1" type="hidden" id="mobile_phone" name="mobile_phone" value="<?php echo $this->_var['validate_info']['bank_mobile']; ?>">
                                <span id="span-phone-modify" class="error-text" style="display: none;"><?php echo $this->_var['lang']['label_mobile_input']; ?></span>
                                <div class="form_prompt"></div>
                            </div>
                        </div>
                        
                        <div class="item">
                            <div class="label"><em class="red">*</em><?php echo $this->_var['lang']['bindMobile_code']; ?>：</div>
                            <div class="value">
                                <div class="sm-input">
                                    <input name="sms_value" id="sms_value" type="hidden" value="sms_code" />
                                    <input type="text" name="mobile_code" tabindex="1" id="mobile_code" />
                                    <a href="javascript:sendSms()" id="zphone" class="sms-btn"><?php echo $this->_var['lang']['getMobile_code']; ?></a>
                                </div>
                                <div class="form_prompt"></div>
                            </div>
                        </div>
                        <?php endif; ?>
                        
                        <div class="item item-button">
                            <div class="label">&nbsp;</div>
                            <div class="value">
                                <input id="flag" type="hidden" value="account_raply" name="flag">
                                <input id="seccode" type="hidden" value="<?php echo $this->_var['sms_security_code']; ?>" name="seccode">
                                <input type="hidden" name="surplus_type" value="1" />
                                <input type="hidden" name="act" value="act_account" />
                                <input type="hidden" name="phoneCode" id="phone_code_callback" value="1" >
                                <input type="hidden" name="sc_guid" value="<?php echo $this->_var['sc_guid']; ?>">
                                <input type="hidden" name="sc_rand" value="<?php echo $this->_var['sc_rand']; ?>">
                                <input type="submit" class="sc-btn sc-redBg-btn" value="<?php echo $this->_var['lang']['Application_withdrawal']; ?>" id="submitBtn" />
                                <input type="reset" class="sc-btn sc-redBg-btn" value="<?php echo $this->_var['lang']['Reset_Form']; ?>" />
                                <div class="form_prompt"></div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <?php endif; ?>
        
        <?php if ($this->_var['action'] == "act_account"): ?>
        <div class="user-mod">
            <div class="user-title">
                <h3><?php echo $this->_var['lang']['Recharge_info']; ?></h3>
            </div>
            <table class="user-table user-table-valueCard">
                <colgroup>
                    <col width="200">
                    <col width="150">
                    <col width="150">
                    <col width="120">
                    <col>
                </colgroup>
                <thead>
                    <tr>
                        <th class="tc"><?php echo $this->_var['lang']['deposit_money']; ?></th>
                        <th><?php echo $this->_var['lang']['payment']; ?></th>
                        <th><?php echo $this->_var['lang']['pay_fee']; ?></th>
                        <th><?php echo $this->_var['lang']['handle']; ?></th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="tc"><?php echo $this->_var['amount']; ?></td>
                        <td class="tc"><?php echo $this->_var['payment']['pay_name']; ?></td>
                        <td class="tc"><?php echo $this->_var['pay_fee']; ?></td>
                        <td class="tc"><?php if ($this->_var['payment']['pay_button'] != ""): ?><?php echo $this->_var['payment']['pay_button']; ?><?php else: ?>&nbsp;<?php endif; ?></td>
                    </tr>
                    <tr>
                        <td colspan="4" class="td td_bf">
                            <h1><?php echo $this->_var['lang']['describe']; ?>：</h1>
                            <span><?php echo $this->_var['payment']['pay_desc']; ?></span>						
                        </td>
                    </tr>					
                </tbody>
            </table>
        </div>    
        <?php endif; ?>
        	

        
        <?php if ($this->_var['action'] == 'baitiao'): ?>
        <div class="user-mod">
            <div class="user-title">
                <h2><?php echo $this->_var['lang']['baitiao']; ?></h2>
            </div>
            <div class="user-baitiao-info">
                <div class="u-b-top">
                    <strong class="u-b-t-tit"><?php echo $this->_var['lang']['Pending_payment']; ?>：</strong>
                    <span><em id="number"><?php echo $this->_var['repay_bt']['numbers']; ?></em><?php echo $this->_var['lang']['zhang']; ?></span>
                    <span><em id="price"><?php if ($this->_var['repay_bt']['total_amount'] > 0): ?><?php echo $this->_var['repay_bt']['total_amount']; ?><?php else: ?>0<?php endif; ?></em><?php echo $this->_var['lang']['element']; ?></span>
                </div>
                <div class="u-b-bot">
                    <div class="user-frame-items">
                        <div class="item">
                            <span><?php echo $this->_var['lang']['bt_Total_amount']; ?></span>
                            <span class="b-price"><?php echo $this->_var['bt_info']['amount']; ?></span>
                        </div>
                        <div class="item">
                            <span><?php echo $this->_var['lang']['Surplus_baitiao']; ?></span>
                            <span class="b-price"><?php echo $this->_var['remain_amount']; ?></span>
                        </div>
                        <div class="item">
                            <span><?php echo $this->_var['lang']['Deferred_repayment_period']; ?></span>
                            <span class="b-price"><?php echo $this->_var['bt_info']['repay_term']; ?> <?php echo $this->_var['lang']['day']; ?></span>
                        </div>
                        <div class="item">
                            <span><?php echo $this->_var['lang']['amount_paid']; ?></span>
                            <span class="b-price"><?php if ($this->_var['repay_bt']['total_amount'] > 0): ?><?php echo $this->_var['repay_bt']['total_amount']; ?><?php else: ?>0<?php endif; ?></span>
                        </div>
                    </div>        
                </div>
            </div>
            <div class="user-title">
                <h2>交易明细</h2>
            </div>
            <div class="user-baitiao-list">
                <table class="user-table user-table-baitiao">
                    <colgroup>
                        <col width="200">
                        <col width="140">
                        <col width="140">
                        <col width="140">
                        <col width="125">
                        <col>
                    </colgroup>
                    <thead>
                        <tr>
                            <th>白条订单</th>
                            <th>消费记账日</th>
                            <th>到期还款日</th>
                            <th>我的还款日</th>
                            <th>金额</th>
                            <th>操作</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php $_from = $this->_var['bt_logs']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'bt_log');if (count($_from)):
    foreach ($_from AS $this->_var['bt_log']):
?>
                        <tr>
                            <td><a href="user.php?act=order_detail&order_id=<?php echo $this->_var['bt_log']['order_id']; ?>" target="_blank" class="ftx-05"><?php echo $this->_var['bt_log']['order_sn']; ?></a><?php if ($this->_var['bt_log']['is_stages'] == 1): ?><span class="ftx-01 ml5">(<?php echo $this->_var['lang']['by_stages']; ?>)</span><?php endif; ?></a></td>
                            <td class="tc"><?php echo $this->_var['bt_log']['use_date']; ?></td>
                            <td class="tc">
                                <?php echo $this->_var['bt_log']['repay_date']; ?>
                                <?php if ($this->_var['bt_log']['is_stages']): ?>
                                    <?php echo $this->_var['bt_log']['yes_num']; ?><?php echo $this->_var['lang']['stage']; ?>/<?php echo $this->_var['bt_log']['stages_total']; ?><?php echo $this->_var['lang']['stage']; ?>
                                <?php endif; ?>
                            </td>
                            <td class="tc"><?php if ($this->_var['bt_log']['repayed_date']): ?><?php echo $this->_var['bt_log']['repayed_date']; ?><?php endif; ?></td>
                            <td class="tc">
                                <?php if ($this->_var['bt_log']['order_amount']): ?>
                                  <?php if ($this->_var['bt_log']['is_stages']): ?>
                                    <?php echo $this->_var['bt_log']['stages_one_price']; ?><?php echo $this->_var['lang']['element']; ?>/<?php echo $this->_var['lang']['stage']; ?>
                                <?php else: ?>
                                    <?php echo $this->_var['bt_log']['order_amount']; ?>
                                  <?php endif; ?>
                                <?php endif; ?>
                            </td>
                            <td class="tc">
                            <?php if ($this->_var['bt_log']['is_refund'] == 1): ?><span class="ftx-03"><?php echo $this->_var['lang']['refound']; ?></span><?php elseif ($this->_var['bt_log']['is_repay'] == 1): ?><span class="ftx-01"><?php echo $this->_var['lang']['Has_paid_off']; ?></span><?php else: ?><a href="user.php?act=repay_bt&order_id=<?php echo $this->_var['bt_log']['order_id']; ?>&pay_id=<?php echo $this->_var['bt_log']['pay_id']; ?>" class="sc-btn"><?php echo $this->_var['lang']['repayment']; ?></a><?php endif; ?>
                            </td>
                        </tr>
                    <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
                    </tbody>
                </table>
            </div>
        </div>
        <?php endif; ?>
        	
        
        
        <?php if ($this->_var['action'] == repay_bt): ?>
        <div class="user-mod">
            <div class="user-item-temp">
                <div class="user-title">
                    <h2>白条还款</h2>
                </div>
                <div class="user-baitiao-hk">
                    <div class="user-items">
                        <div class="item">
                            <div class="label"><?php echo $this->_var['lang']['formated_order_amount']; ?>：</div>
                            <div class="value"><span class="txt-lh"><?php echo $this->_var['order']['formated_order_amount']; ?></span></div>
                        </div>
                        <?php if ($this->_var['stages_info']['is_stages'] == 1): ?>
                        <div class="item">
                            <div class="label"><?php echo $this->_var['lang']['rate']; ?>：</div>
                            <div class="value"><span class="txt-lh"><?php if ($this->_var['stages_info']['stages_total'] == 1): ?>0%<?php else: ?><?php echo $this->_var['stages_rate']; ?>%<?php endif; ?></span></div>
                        </div>
                        <?php endif; ?>
                        <?php if ($this->_var['stages_info']['is_stages'] == 1): ?>
                        <div class="item">
                            <div class="label"><?php echo $this->_var['lang']['Number_periods']; ?>：</div>
                            <div class="value"><span class="txt-lh"><?php echo $this->_var['stages_info']['yes_num']; ?><?php echo $this->_var['lang']['stage']; ?>/<?php echo $this->_var['stages_info']['stages_total']; ?><?php echo $this->_var['lang']['stage']; ?></span></div>
                        </div>
                        <?php endif; ?>
                        <div class="item">
                            <div class="label">应还金额：</div>
                            <div class="value">
                                <?php if ($this->_var['stages_info']['is_stages'] == 1): ?>
                                <span class="ftx-01 txt-lh"><?php echo $this->_var['stages_info']['stages_one_price']; ?>元</span>
                                <?php else: ?>
                                <span class="ftx-01 txt-lh"><?php echo $this->_var['order']['order_amount']; ?>元</span>
                                <?php endif; ?>
                            </div>
                        </div>
                        <?php if ($this->_var['payment_list']): ?>
                        <form name="payment" method="post" action="user.php" >
                        <div class="item">
                            <div class="label"><?php echo $this->_var['lang']['payment']; ?>：</div>
                            <div class="value mt5">
                                <select name="pay_id" class="select fl">
                                    <?php $_from = $this->_var['payment_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'payment');if (count($_from)):
    foreach ($_from AS $this->_var['payment']):
?>
                                    <option value="<?php echo $this->_var['payment']['pay_id']; ?>">
                                        <?php echo $this->_var['payment']['pay_name']; ?>(<?php echo $this->_var['lang']['pay_fee']; ?>:<?php echo $this->_var['payment']['format_pay_fee']; ?>)
                                    </option>
                                    <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
                                </select>
                                <input type="hidden" name="act" value="repay_bt" />
                                <input type="hidden" name="order_id" value="<?php echo $this->_var['order']['order_id']; ?>" />
                                <input type="submit" name="Submit" class="btn sc-redBg-btn btn30 fl ml10" value="<?php echo $this->_var['lang']['button_submit']; ?>" />
                            </div>
                        </div>
                        <div class="item">
                            <div class="label">&nbsp;</div>
                            <div class="value"><div class="pay_btn"><?php echo $this->_var['order']['pay_online']; ?></div></div>
                        </div>
                        </form>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
        <?php endif; ?>
        	
        
        
        <?php if ($this->_var['action'] == 'merchants_upgrade'): ?>
        <div class="user-mod">
            <div class="user-title">
                <h2><?php echo $this->_var['lang']['store_grade_list']; ?></h2>
            </div>
            <div class="user-shop-warp">
                <table class="user-table user-table-shop">
                    <colgroup>
                        <col width="150">
                        <col width="80">
                        <col width="80">
                        <col width="150">
                        <col width="230">
                        <col width="80">
                        <col>
                    </colgroup>
                    <thead>
                        <tr>
                            <th><?php echo $this->_var['lang']['grade_name']; ?></th>
                            <th><?php echo $this->_var['lang']['good_number']; ?></th>
                            <th><?php echo $this->_var['lang']['temp_number']; ?></th>
                            <th><?php echo $this->_var['lang']['grade_introduce']; ?></th>
                            <th><?php echo $this->_var['lang']['entry_criteria']; ?></th>
                            <th><?php echo $this->_var['lang']['grade_img']; ?></th>
                            <th><?php echo $this->_var['lang']['handle']; ?></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $_from = $this->_var['seller_grade']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'item');$this->_foreach['name'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['name']['total'] > 0):
    foreach ($_from AS $this->_var['item']):
        $this->_foreach['name']['iteration']++;
?>
                         <tr>
                            <td><i class="user-rank user-rank-<?php echo $this->_foreach['name']['iteration']; ?>"></i><span class="user-rank-span"><?php echo $this->_var['item']['grade_name']; ?></span></td>
                            <td class="tc"><?php echo $this->_var['item']['goods_sun']; ?>个</td>
                            <td class="tc"><?php echo $this->_var['item']['seller_temp']; ?>个</td>
                            <td class="tc"><?php echo $this->_var['item']['grade_introduce']; ?></td>
                            <td class="tc"><?php echo $this->_var['item']['entry_criteria']; ?></td>
                            <td class="tc"><?php if ($this->_var['item']['grade_img']): ?><a href="<?php echo $this->_var['item']['grade_img']; ?>"  title="<?php echo $this->_var['lang']['grade_img']; ?>" target="_blank"><img src="<?php echo $this->_var['item']['grade_img']; ?>" width="30" height="30"></a><?php endif; ?></td>
                            <td class="tc">
                                <?php if ($this->_var['item']['id'] == $this->_var['grade_id']): ?>
                                    <a href="javascript:void(0);" class="sc-btn sc-btn-disabled">当前等级</a>
                                <?php else: ?>           
                                    <a href="user.php?act=application_grade&grade_id=<?php echo $this->_var['item']['id']; ?>" class="sc-btn"><?php echo $this->_var['lang']['once']; ?></a>
                                <?php endif; ?>
                            </td>
                        </tr>
                        <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
                    </tbody>
                </table>
            </div>
        </div>
        <?php endif; ?>
        
                    
        
        <?php if ($this->_var['action'] == 'application_grade'): ?>
        <div class="user-mod user-profile">
            <form action="user.php" method="post" name="grade_theForm"  enctype="multipart/form-data">
                <div class="user-account-warp">
                    <?php if ($this->_var['seller_grade']): ?>
                    <div class="user-title">
                        <h2><?php echo $this->_var['lang']['grade_info']; ?></h2>
                        <a href="user.php?act=merchants_upgrade" class="more"><?php echo $this->_var['lang']['back']; ?></a>
                    </div>
                    <div class="user-grade-warp">
                        <div class="user-items">
                            <div class="item">
                                <div class="label"><?php echo $this->_var['lang']['now_grade']; ?>：</div>
                                <div class="value"><span class="txt-lh"><?php echo $this->_var['seller_grade']['grade_name']; ?></span></div>
                            </div>
                            <div class="item">
                                <div class="label"><?php echo $this->_var['lang']['in_time']; ?>：</div>
                                <div class="value">
                                    <span class="txt-lh"><?php echo $this->_var['seller_grade']['addtime']; ?></span>
                                </div>
                            </div>
                            <div class="item">
                                <div class="label"><?php echo $this->_var['lang']['end_time']; ?>：</div>
                                <div class="value">
                                    <span class="txt-lh"><?php echo $this->_var['seller_grade']['end_time']; ?></span>
                                </div>
                            </div>
                            <?php if ($this->_var['seller_grade']['refund_price'] > 0): ?>
                            <div class="item">
                                <div class="label"><?php echo $this->_var['lang']['refund_grade']; ?>：</div>
                                <div class="value">
                                    <span class="txt-lh total">￥<em><?php echo $this->_var['seller_grade']['refund_price']; ?></em></span>
                                    <input type="hidden" value="<?php echo $this->_var['seller_grade']['refund_price']; ?>" name='refund_price'/>
                                </div>
                            </div>
                            <?php endif; ?>
                        </div>
                    </div>
                    <?php endif; ?>

                    <?php $_from = $this->_var['entry_criteriat_info']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'info');if (count($_from)):
    foreach ($_from AS $this->_var['info']):
?>
                    <?php if ($this->_var['info']['child']): ?>
                    <div class="user-title">
                        <h2><?php echo $this->_var['info']['criteria_name']; ?></h2>
                    </div>
                    <div class="user-grade-warp">
                        <div class="user-items">
                            <?php $_from = $this->_var['info']['child']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'child');if (count($_from)):
    foreach ($_from AS $this->_var['child']):
?>
                            <div class="item">
                                <div class="label"><i class="red"><?php if ($this->_var['child']['is_mandatory'] == 1): ?>*&nbsp;<?php endif; ?></i><?php echo $this->_var['child']['criteria_name']; ?>：</div>
                                <?php if ($this->_var['child']['type'] == 'text'): ?>
                                <div class="value">
                                    <input type="text" name='value[<?php echo $this->_var['child']['id']; ?>]' class="text text-1" />
                                    <div class="notic value[<?php echo $this->_var['child']['id']; ?>]"></div>
                                </div>
                                <?php elseif ($this->_var['child']['type'] == 'select'): ?>
                                <div class="value">
                                    <div class="imitate_select">
                                        <div class="cite"><span>请选择</span><i class="iconfont icon-down"></i></div>
                                        <ul>
                                            <li><a href="javascript:void(0);" data-value="0"><?php echo $this->_var['lang']['please_select']; ?><?php echo $this->_var['name_of_region']['0']; ?></a></li>
                                            <?php $_from = $this->_var['child']['option_value']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'value');if (count($_from)):
    foreach ($_from AS $this->_var['value']):
?>
                                            <li><a href="javascript:void(0);" data-value="<?php echo $this->_var['value']; ?>"><?php echo $this->_var['value']; ?></a></li>
                                            <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
                                        </ul>
                                        <input name='value[<?php echo $this->_var['child']['id']; ?>]' type="hidden" value="">
                                    </div>
                                    <div class="notic value[<?php echo $this->_var['child']['id']; ?>]"></div>
                                </div>
                                <?php elseif ($this->_var['child']['type'] == 'textarea'): ?>
                                <div class="value">
                                    <textarea class="textarea textarea2" name='value[<?php echo $this->_var['child']['id']; ?>]'></textarea>
                                    <div class="notic value[<?php echo $this->_var['child']['id']; ?>]"></div>
                                </div>
                                <?php elseif ($this->_var['child']['type'] == 'file'): ?>
                                <div class="value">
                                    <div class="value-file">
                                        <input class="btn fl" value="选择文件" type="button">
                                        <input name="" id="value[<?php echo $this->_var['child']['id']; ?>]" class="txt fl" type="text">
                                        <input name="value[<?php echo $this->_var['child']['id']; ?>]" class="file fl" id="fileField" size="28" onchange="document.getElementById('value[<?php echo $this->_var['child']['id']; ?>]').value=this.value" type="file">
                                        <input type="hidden" value="<?php echo $this->_var['child']['id']; ?>" name='file_id[]'>
                                        <div class="notic value[<?php echo $this->_var['child']['id']; ?>]"></div>
                                    </div>
                                </div>
                                <?php elseif ($this->_var['child']['type'] == 'charge' && $this->_var['child']['charge'] > 0): ?>
                                <div class="value">
                                    <span class="total txt-lh red">￥<?php echo $this->_var['child']['charge']; ?>/<?php echo $this->_var['lang']['year']; ?></span>
                                </div>
                                <?php endif; ?>
                            </div>
                            <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
                        </div>
                    </div>
                    <?php endif; ?>
                    <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
                    
                    <?php if ($this->_var['entry_criteriat_info']['count_charge'] > 0): ?>
                    <div class="user-title">
                        <h2><?php echo $this->_var['lang']['information_count']; ?></h2>
                    </div>
                    <div class="user-grade-warp">
                        <div class="user-items">
                            <div class="item">
                                <div class="label"><?php echo $this->_var['lang']['settled_down']; ?>：</div>
                                <div class="value">
                                    <div class="amount-warp mt5">
                                        <input class="buy-num" id="quantity" value="1" name="fee_num" defaultnumber="1" onkeyup="add_charge('keyup')">
                                        <div class="a-btn">
                                            <a href="javascript:void(0);" class="btn-add" onclick="add_charge('add')"><i class="iconfont icon-up"></i></a>
                                            <a href="javascript:void(0);" class="btn-reduce" onclick="add_charge('reduce')"><i class="iconfont icon-down"></i></a>
                                        </div>
                                        <input type="hidden" value="<?php echo $this->_var['entry_criteriat_info']['count_charge']; ?>" name='count_charge'>
                                    </div>
                                </div>
                            </div>
                            <div class="item">
                                <div class="label"><?php echo $this->_var['lang']['payment']; ?>：</div>
                                <div class="value pay_id_erro">
                                    <?php $_from = $this->_var['pay']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'pay');$this->_foreach['payName'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['payName']['total'] > 0):
    foreach ($_from AS $this->_var['pay']):
        $this->_foreach['payName']['iteration']++;
?>
                                        <?php if ($this->_var['pay']['pay_id'] != 1): ?>
                                            <?php if ($this->_var['pay']['pay_code'] != 'chunsejinrong' && $this->_var['pay']['pay_code'] != 'alipay_bank' && $this->_var['pay']['pay_code'] != 'onlinepay'): ?>
                                            <div class="radio-item">
                                                <input type="radio" <?php if (($this->_foreach['payName']['iteration'] - 1) == 1): ?>checked<?php endif; ?> name="pay_id" class="ui-radio" value="<?php echo $this->_var['pay']['pay_id']; ?>" id="payment_<?php echo $this->_var['pay']['pay_id']; ?>">
                                                <label for="payment_<?php echo $this->_var['pay']['pay_id']; ?>" class="ui-radio-label"><?php echo $this->_var['pay']['pay_name']; ?></label>
                                            </div>
                                            <?php endif; ?>
                                        <?php endif; ?>
                                    <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
                                </div>
                            </div>
                            <div class="item">
                                <div class="label"><?php echo $this->_var['lang']['label_total_user']; ?>：</div>
                                <div class="value">
                                    <span class="total txt-lh red">￥<em id="count_charge"><?php echo $this->_var['entry_criteriat_info']['count_charge']; ?></em></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php endif; ?>
                    <div class="user-grade-warp">
                        <div class="user-items">
                            <div class="item item-button">
                                <div class="label">&nbsp;</div>
                                <div class="value">
                                    <input type="hidden" name="grade_id" value="<?php echo $this->_var['grade_id']; ?>"/>
                                    <input type="hidden" name="all_count_charge"  value=""/>
                                    <input type="hidden" name="act"  value="confirm_inventory"/>
                                    <input type="hidden" name="no_cumulative_price"  value="<?php echo $this->_var['entry_criteriat_info']['no_cumulative_price']; ?>">
                                    <a href="javascript:void(0);" class="sc-btn sc-redBg-btn" ectype="submit"><?php echo $this->_var['lang']['submit_request']; ?></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <?php endif; ?>
		
		<?php if ($this->_var['action'] == 'confirm_inventory'): ?>
		<div class="user-mod">
			<div class="user-title">
                <h2><?php echo $this->_var['lang']['Settlement']; ?></h2>
            </div>
			<div class="invent-box">
				<div class="sku"><?php echo $this->_var['lang']['order_number']; ?>：<?php echo $this->_var['order']['order_sn']; ?></div>
				<div class="extra"><?php echo $this->_var['lang']['Select_payment']; ?>: <strong><?php echo $this->_var['payment']['pay_name']; ?><?php if ($this->_var['pay_fee'] > 0): ?>，<?php echo $this->_var['lang']['Fee_for_user']; ?>：<?php echo $this->_var['pay_fee']; ?><?php endif; ?></strong>，<?php echo $this->_var['lang']['payment_amount_user']; ?>：<strong><?php echo $this->_var['amount']; ?></strong></div>
				<?php if ($this->_var['payment']['pay_code'] != 'bank'): ?>
				<div class="or-btn"><?php echo $this->_var['payment']['pay_button']; ?></div>
				<?php endif; ?>
			</div>
		</div>
		<?php endif; ?>
        
                    
        
        <?php if ($this->_var['action'] == 'bonus'): ?>
        <div class="user-mod">
            <div class="user-title">
                <h2><?php echo $this->_var['lang']['bonus']; ?></h2>
            </div>
            <div class="user-bonus-warp">
                <form action="" method="post">
                <div class="user-items">
                    <div class="item">
                        <div class="label"><em>*</em>红包卡号：</div>
                        <div class="value">
                            <input type="text" name="bonus_sn" class="text text-2 txt_input_cardnum">
                        </div>
                    </div>
                    <div class="item">
                        <div class="label"><em>*</em>红包密码：</div>
                        <div class="value">
                            <input type="text" name="bonus_password" class="text text-2 txt_input_cardpw">
                        </div>
                    </div> 
                    <div class="item">
                        <div class="label"><em>*</em><?php echo $this->_var['lang']['comment_captcha']; ?>：</div>
                        <div class="value">
                            <div class="sm-input">
                                <input type="text" size="4" name="captcha" class="captcha_input">
                                <img src="captcha_verify.php?captcha=is_bonus&width=100&height=32&font_size=14&<?php echo $this->_var['rand']; ?>" onClick="this.src='captcha_verify.php?captcha=is_bonus&width=100&height=28&font_size=14&'+Math.random()"  name="captcha" class="captcha_img">
                            </div>
                        </div>
                    </div>
                    <div class="item item-button">
                        <div class="label"></div>
                        <div class="value">
                            <a href="javascript:void(0);" class="sc-btn sc-redBg-btn"  id="bind_btn" onclick="new_addBonus();"><?php echo $this->_var['lang']['Bind_current_account']; ?></a>
                        </div>
                    </div>          
                </div>
                </form>
            </div>
            <div class="user-bonus-temp" ectype="tabSection">
                <div class="user-title">
                    <ul class="tabs" ectype="tabs">
                        <li id="bound_giftcard" class="active"><a href="javascript:void(0);"><?php echo $this->_var['lang']['keyong']; ?>(<?php echo $this->_var['bonus']['record_count']; ?>)</a></li>
                        <li id="upcoming_giftcard"><a href="javascript:void(0);"><?php echo $this->_var['lang']['About_expire']; ?>(<?php echo $this->_var['bonus1']['record_count']; ?>)</a></li>
                        <li id="over_giftcard"><a href="javascript:void(0);"><?php echo $this->_var['lang']['have_been_exhausted']; ?>(<?php echo $this->_var['bonus2']['record_count']; ?>)</a></li>
                    </ul>
                </div>
                <div class="user-bonus-info" ectype="tabContent">
                    <div id="gift_card_list_1">
                        <?php if ($this->_var['bonus']['available_list']): ?>
                        <div class="items">
                        <?php $_from = $this->_var['bonus']['available_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'item');$this->_foreach['available_list'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['available_list']['total'] > 0):
    foreach ($_from AS $this->_var['item']):
        $this->_foreach['available_list']['iteration']++;
?>
                            <div class="item<?php if ($this->_foreach['available_list']['iteration'] % 3 == 0): ?> item-last<?php endif; ?>">
                                <div class="b-price"><?php echo $this->_var['item']['type_money']; ?></div>
                                <div class="b-i-bot">
                                    <div class="storeName"><?php echo $this->_var['item']['shop_name']; ?></div>
                                    <p>卡号：<?php echo empty($this->_var['item']['bonus_sn']) ? 'N/A' : $this->_var['item']['bonus_sn']; ?> - 订单限额：<?php echo $this->_var['item']['min_goods_amount']; ?></p>
                                    <p><?php echo $this->_var['item']['use_startdate']; ?> ~ <?php echo $this->_var['item']['use_enddate']; ?></p>
                                </div>
                                <?php if ($this->_var['item']['usebonus_type']): ?><i class="i-soon"><?php echo $this->_var['lang']['general_audience']; ?></i><?php endif; ?>
                            </div>
                        <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
                        </div>
                        <?php else: ?>
                        <div class="no_records">
                            <i class="no_icon_two"></i>
                            <div class="no_info">
                                <h3><?php echo $this->_var['lang']['no_bonus_keyong']; ?></h3>
                            </div>
                        </div>
                        <?php endif; ?>
                        <?php if ($this->_var['bonus']['record_count'] > $this->_var['size']): ?><div class="pages"><div class="pages-it"><?php echo $this->_var['bonus']['paper']; ?></div></div><?php endif; ?>
                    </div>
                    <div id="gift_card_list_2" style=" display:none">
                    <?php if ($this->_var['bonus1']['expire_list']): ?>
                        <div class="items">
                        <?php $_from = $this->_var['bonus1']['expire_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'item');$this->_foreach['expire_list'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['expire_list']['total'] > 0):
    foreach ($_from AS $this->_var['item']):
        $this->_foreach['expire_list']['iteration']++;
?>
                        <div class="item<?php if ($this->_foreach['expire_list']['iteration'] % 3 == 0): ?> item-last<?php endif; ?>">
                            <div class="b-price"><?php echo $this->_var['item']['type_money']; ?></div>
                            <div class="b-i-bot">
                                <div class="storeName"><?php echo $this->_var['item']['shop_name']; ?></div>
                                <p>卡号：<?php echo empty($this->_var['item']['bonus_sn']) ? 'N/A' : $this->_var['item']['bonus_sn']; ?> - 订单限额：<?php echo $this->_var['item']['min_goods_amount']; ?></p>
                                <p><?php echo $this->_var['item']['use_startdate']; ?> ~ <?php echo $this->_var['item']['use_enddate']; ?></p>
                            </div>
                            <i class="i-soon">即将到期</i>
                        </div>
                        <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
                        </div>
                    <?php else: ?>
                    <div class="no_records">
                        <i class="no_icon_two"></i>
                        <div class="no_info">
                            <h3><?php echo $this->_var['lang']['no_bonus_daoqi']; ?></h3>
                        </div>
                    </div>
                    <?php endif; ?>
                    </div>
                    <div id="gift_card_list_3" style=" display:none">
                    <?php if ($this->_var['bonus2']['useup_list']): ?>
                        <div class="items">
                        <?php $_from = $this->_var['bonus2']['useup_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'item');$this->_foreach['useup_list'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['useup_list']['total'] > 0):
    foreach ($_from AS $this->_var['item']):
        $this->_foreach['useup_list']['iteration']++;
?>
                        <div class="item item-disabled<?php if ($this->_foreach['useup_list']['iteration'] % 3 == 0): ?> item-last<?php endif; ?>">
                            <div class="b-price"><?php echo $this->_var['item']['type_money']; ?></div>
                            <div class="b-i-bot">
                                <div class="storeName"><?php echo $this->_var['item']['shop_name']; ?></div>
                                <p>卡号：<?php echo empty($this->_var['item']['bonus_sn']) ? 'N/A' : $this->_var['item']['bonus_sn']; ?> - 订单限额：<?php echo $this->_var['item']['min_goods_amount']; ?></p>
                                <p><?php echo $this->_var['item']['use_startdate']; ?> ~ <?php echo $this->_var['item']['use_enddate']; ?></p>
                            </div>
                            <i class="i-soon">已经使用</i>
                        </div>
                        <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
                        </div>
                    <?php else: ?>
                    <div class="no_records">
                        <i class="no_icon_two"></i>
                        <div class="no_info">
                            <h3><?php echo $this->_var['lang']['no_bonus_end']; ?></h3>
                        </div>
                    </div>
                    <?php endif; ?>
                    </div>
                </div>
            </div>
            <div class="user-prompt mt20">
                <div class="tit"><span>红包温馨提示</span><i class="iconfont icon-down"></i></div>
                <div class="info">
                    <?php echo $this->_var['lang']['bonus_info']; ?>
                </div>
            </div>
        </div>
        <?php endif; ?> 
        
        
        
        <?php if ($this->_var['action'] == 'value_card'): ?>
        <div class="user-mod">
            <div class="user-title">
                <h2>绑定储值卡</h2>
            </div>
            <div class="value-card-warp">
                <div class="user-items">
                    <div class="item">
                        <div class="label"><em>*</em>储值卡卡号：</div>
                        <div class="value">
                            <input type="text" name="card_sn" class="text text-2 txt_input_cardnum">
                        </div>
                    </div>
                    <div class="item">
                        <div class="label"><em>*</em>储值卡密码：</div>
                        <div class="value">
                            <input type="text" name="card_password" class="text text-2 txt_input_cardpw">
                        </div>
                    </div> 
                    <div class="item">
                        <div class="label"><em>*</em><?php echo $this->_var['lang']['comment_captcha']; ?>：</div>
                        <div class="value">
                            <div class="sm-input">
                                <input type="text" name="captcha" class="captcha_input" size="4">
                                <img src="captcha_verify.php?captcha=is_value_card&width=100&height=32&font_size=14&<?php echo $this->_var['rand']; ?>" onClick="this.src='captcha_verify.php?captcha=is_value_card&width=100&height=28&font_size=14&'+Math.random()" class="captcha_img">
                            </div>
                        </div>
                    </div>
                    <div class="item item-button">
                        <div class="label"></div>
                        <div class="value">
                            <a href="javascript:void(0);" id="bind_btn" class="sc-btn sc-redBg-btn" ectype="submitVC"><?php echo $this->_var['lang']['Bind_current_account']; ?></a>
							<input type="hidden" name="user_id" id="user_id" value="<?php echo $this->_var['user_id']; ?>" />
                        </div>
                    </div>          
                </div>
            </div>
            <div class="user-title">
                <h2><?php echo $this->_var['lang']['value_card_list']; ?></h2>
            </div>
            <div class="value-card-list">
                <?php if ($this->_var['bind_vc']): ?>
                <table class="user-table user-table-cardList">
                    <colgroup>
                        <col width="200">
                        <col width="140">
                        <col width="140">
                        <col width="120">
                        <col width="120">
                        <col>
                    </colgroup>
                    <thead>
                        <tr>
                            <th class="tc">卡号</th>
                            <th>面值</th>
                            <th>金额</th>
                            <th>状态</th>
                            <th>过期时间</th>
                            <th>操作</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php $_from = $this->_var['bind_vc']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'vo');if (count($_from)):
    foreach ($_from AS $this->_var['vo']):
?>
                        <tr>
                            <td class="tc"><?php echo $this->_var['vo']['value_card_sn']; ?></td>
                            <td class="tc"><?php echo $this->_var['vo']['vc_value']; ?></td>
                            <td class="tc"><?php echo $this->_var['vo']['card_money']; ?></td>
                            <td class="tc">已激活</td>
                            <td class="tc"><?php echo $this->_var['vo']['end_time']; ?></td>
                            <td class="tc c-handle">
                                <a href="user.php?act=value_card_info&vid=<?php echo $this->_var['vo']['vid']; ?>" class="sc-btn"><?php echo $this->_var['lang']['View_details']; ?></a>
                                <?php if ($this->_var['vo']['is_rec']): ?><a href="user.php?act=to_paid&vid=<?php echo $this->_var['vo']['vid']; ?>" class="sc-btn"><?php echo $this->_var['lang']['to_paid']; ?></a><?php endif; ?>
                            </td>
                        </tr>
                    <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
                    </tbody>
                </table>
                <?php else: ?>
                <div class="no_records">
                    <i class="no_icon_two"></i>
                    <div class="no_info">
                        <h3><?php 
$k = array (
  'name' => 'get_page_no_records',
  'filename' => $this->_var['filename'],
  'act' => $this->_var['action'],
);
echo $this->_echash . $k['name'] . '|' . serialize($k) . $this->_echash;
?></h3>
                    </div>
                </div>
                <?php endif; ?>
            </div>
            <div class="user-prompt mt50">
                <div class="tit"><span>储值卡温馨提示</span><i class="iconfont icon-down"></i></div>
                <div class="info">
                    <p>1、<?php echo $this->_var['lang']['card_desc']['one']; ?></p>
                    <p>2、<?php echo $this->_var['lang']['card_desc']['two']; ?></p>
                </div>
            </div>
        </div>
        <?php endif; ?>
        

        
        <?php if ($this->_var['action'] == 'to_paid'): ?>
        <div class="user-mod">
            <div class="user-title">
                <h2>储值卡充值</h2>
            </div>
            <div class="value-card-warp">
                <div class="user-items">
                    <div class="item">
                        <div class="label"><em>*</em>充值卡卡号：</div>
                        <div class="value">
                            <input type="text" name="pay_card_sn" class="text text-2 txt_input_cardnum2">
                        </div>
                    </div>
                    <div class="item">
                        <div class="label"><em>*</em>充值卡密码：</div>
                        <div class="value">
                            <input type="text" name="pay_card_password" class="text text-2 txt_input_cardpw2">
                        </div>
                    </div> 
                    <div class="item">
                        <div class="label"><em>*</em><?php echo $this->_var['lang']['comment_captcha']; ?>：</div>
                        <div class="value">
                            <div class="sm-input">
                                <input type="text" name="captcha" class="captcha_input captcha_error2" size="4">
                                <img src="captcha_verify.php?captcha=is_pay_card&width=100&height=32&font_size=14&<?php echo $this->_var['rand']; ?>" onClick="this.src='captcha_verify.php?captcha=is_pay_card&width=100&height=28&font_size=14&'+Math.random()" class="captcha_img">
                                
                            </div>
                        </div>
                    </div>
                    <div class="item item-button">
                        <div class="label"></div>
                        <div class="value">
                            <a href="javascript:void(0);" class="sc-btn sc-redBg-btn" ectype="submitVC">去充值</a>
                        </div>
                    </div>          
                </div>
            </div>
        </div>
        <?php endif; ?>
        
        
        
        <?php if ($this->_var['action'] == 'value_card_info'): ?>
        <div class="user-mod">
            <div class="user-title">
                <h2><?php echo $this->_var['lang']['value_card_info']; ?></h2>
                <h3><?php echo $this->_var['explain']; ?></h3>
            </div>
            <table class="user-table user-table-valueCard">
                <colgroup>
                    <col width="200">
                    <col width="150">
                    <col width="150">
                    <col width="120">
                    <col>
                </colgroup>
                <thead>
                    <tr>
                        <th class="tc"><?php echo $this->_var['lang']['lab_card_id']; ?></th>
                        <th><?php echo $this->_var['lang']['order_number']; ?></th>
                        <th><?php echo $this->_var['lang']['Use_the_amount_of']; ?></th>
                        <th><?php echo $this->_var['lang']['deposit_money']; ?></th>
                        <th><?php echo $this->_var['lang']['use_time']; ?></th>
                    </tr>
                </thead>
                <tbody>
                <?php if ($this->_var['value_card_info']): ?>
                    <?php $_from = $this->_var['value_card_info']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'item');if (count($_from)):
    foreach ($_from AS $this->_var['item']):
?>
                    <tr>
                        <td class="tc"><?php echo $this->_var['item']['rid']; ?></td>
                        <td class="tc"><?php echo empty($this->_var['item']['order_sn']) ? 'N/A' : $this->_var['item']['order_sn']; ?></td>
                        <td class="tc"><?php echo empty($this->_var['item']['use_val']) ? 'N/A' : $this->_var['item']['use_val']; ?></td>
                        <td class="tc"><?php echo empty($this->_var['item']['add_val']) ? 'N/A' : $this->_var['item']['add_val']; ?></td>
                        <td class="tc"><p class="date"><?php echo $this->_var['item']['record_time']; ?></p></td>
                    </tr>
                    <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
                    <?php else: ?>                                
                    <tr><td colspan="5" class="td td_bf"><?php echo $this->_var['lang']['no_use_record']; ?></td></tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
        <?php endif; ?> 
        
        
        
        <?php if ($this->_var['action'] == 'account_bind'): ?>
        <div class="user-mod">
            <div class="user-title">
                <h2><?php echo $this->_var['lang']['bind_login']; ?></h2>
            </div>
            <div class="account-bind-warp clearfix">
                <?php if ($this->_var['insert']['qq_install'] == 1): ?>
                <div class="account-bind-item">
                    <i class="ab-icon ab-icon-qq"></i>
                    <span><?php echo $this->_var['lang']['bind_qq']; ?></span>
                    <div class="b-btn">
                        <?php if ($this->_var['qq_info']): ?>
                            <a data-title="<?php echo $this->_var['lang']['Un_bind']; ?>" data-id="<?php echo $this->_var['qq_info']['id']; ?>" data-divid="qq_remove" data-dialog="oathdialog" href="javascript:void(0);" class="qq-remove sc-btn" data-username="<?php echo $this->_var['info']['username']; ?>"  data-identity="QQ">解除绑定</a>
                        <?php else: ?>
                            <a href="user.php?act=oath&type=qq" class="sc-btn">添加绑定</a>
                        <?php endif; ?>
                    </div>
                    <div class="b-type"><i class="iconfont<?php if ($this->_var['qq_info']): ?> icon-ok<?php else: ?> icon-info-sign<?php endif; ?>"></i><?php if ($this->_var['qq_info']): ?><?php echo $this->_var['lang']['Bound']; ?><?php else: ?><?php echo $this->_var['lang']['not_Bound']; ?><?php endif; ?></div>
                </div>
                <?php endif; ?>
                <div class="account-bind-item hide">
                    <i class="ab-icon ab-icon-wechat"></i>
                    <span><?php echo $this->_var['lang']['weixin_one']; ?></span>
                    <div class="b-btn">
                    <?php if ($this->_var['weixin_info']): ?>
                    	<a data-title="<?php echo $this->_var['lang']['Un_bind']; ?>" data-id="<?php echo $this->_var['weibo_info']['id']; ?>" data-divid="weibo_remove" data-dialog="oathdialog" href="javascript:void(0);" class="weibo-remove sc-btn" data-username="<?php echo $this->_var['info']['username']; ?>"  data-identity="微博">解除绑定</a>
                    <?php else: ?>
                    	<a href="wechat_oauth.php?act=login&user_id=<?php echo $this->_var['user_id']; ?>" class="sc-btn">添加绑定</a>
                    <?php endif; ?>
                    </div>
                    <div class="b-type"><i class="iconfont<?php if ($this->_var['weixin_info']): ?> icon-ok<?php else: ?> icon-info-sign<?php endif; ?>"></i><?php if ($this->_var['weixin_info']): ?><?php echo $this->_var['lang']['Bound']; ?><?php else: ?><?php echo $this->_var['lang']['not_Bound']; ?><?php endif; ?></div>
                </div>
                <?php if ($this->_var['insert']['weibo_install'] == 1): ?>
                <div class="account-bind-item">
                    <i class="ab-icon ab-icon-weibo"></i>
                    <span><?php echo $this->_var['lang']['weibo_one']; ?></span>
                    <div class="b-btn">
                    <?php if ($this->_var['weibo_info']): ?>
                    	<a data-title="<?php echo $this->_var['lang']['Un_bind']; ?>" data-id="<?php echo $this->_var['weixin_info']['id']; ?>" data-divid="weixin_remove" data-dialog="oathdialog" href="javascript:void(0);" class="weixin-remove sc-btn" data-username="<?php echo $this->_var['info']['username']; ?>"  data-identity="微信">解除绑定</a>
                    <?php else: ?>
                    	<a href="user.php?act=oath&type=weibo" class="sc-btn">添加绑定</a>
                    <?php endif; ?>
                    </div>
                    <div class="b-type"><i class="iconfont<?php if ($this->_var['weibo_info']): ?> icon-ok<?php else: ?> icon-info-sign<?php endif; ?>"></i><?php if ($this->_var['weibo_info']): ?><?php echo $this->_var['lang']['Bound']; ?><?php else: ?><?php echo $this->_var['lang']['not_Bound']; ?><?php endif; ?></div>
                </div>
                <?php endif; ?>
            </div>
        </div>
        <?php endif; ?>
        	
        
        
        <?php if ($this->_var['action'] == 'crowdfunding'): ?>
        <div class="user-mod" ectype="tabSection">
            <div class="user-title">
                <h2><?php echo $this->_var['lang']['crowdfunding']; ?></h2>
                <ul class="tabs zc_btn" ectype="tabs">
                    <li class="active"><a href="javascript:void(0);"><?php echo $this->_var['lang']['I_support']; ?></a></li>
                    <li><a href="javascript:void(0);"><?php echo $this->_var['lang']['I_concerned']; ?></a></li>
                </ul>
            </div>
            <div class="crowdfunding-warp">
                <div class="crowdfunding-main zc_my_main" ectype="tabContent">
                    <div class="my_box">
                        <?php if ($this->_var['zc_support_list']): ?>
                        <div class="cdf-tab ui-tab">
                            <a href="javascript:void(0);" data-val="1" class="curr"><?php echo $this->_var['lang']['all_attribute']; ?></a>
                            <a href="javascript:void(0);" data-val="2"><?php echo $this->_var['lang']['Already_paid']; ?></a>
                            <a href="javascript:void(0);" data-val="3"><?php echo $this->_var['lang']['not_paid']; ?></a>
                        </div>
                        <?php endif; ?>
                        <div class="pay_item">
                            <?php if ($this->_var['zc_support_list']): ?>
                            <div class="crowdfunding-list">
                                <table class="user-table user-table-cdf">
                                    <colgroup>
                                        <col width="350">
                                        <col width="100">
                                        <col width="100">
                                        <col width="100">
                                        <col width="100">
                                        <col>
                                    </colgroup>
                                    <thead>
                                        <tr>
                                            <th><?php echo $this->_var['lang']['Project_info']; ?></th>
                                            <th>订单号</th>
                                            <th>已完成</th>
                                            <th><?php echo $this->_var['lang']['zc_raise']; ?></th>
                                            <th><?php echo $this->_var['lang']['residual_time']; ?></th>
                                            <th><?php echo $this->_var['lang']['handle']; ?></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php $_from = $this->_var['zc_support_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'vo');if (count($_from)):
    foreach ($_from AS $this->_var['vo']):
?>
                                        <tr>
                                            <td>
                                                <div class="cdf-goods">
                                                    <div class="cdf-img"><a href="crowdfunding.php?act=detail&id=<?php echo $this->_var['vo']['id']; ?>"><img src="<?php echo $this->_var['vo']['title_img']; ?>"></a></div>
                                                    <div class="cdf-info">
                                                        <div class="cdf-name"><a href="#"><?php echo $this->_var['vo']['title']; ?></a><?php if ($this->_var['vo']['surplus_time'] != 0): ?><span class="hand"><?php echo $this->_var['lang']['zc_in']; ?></span><?php else: ?><span><?php echo $this->_var['lang']['has_ended']; ?></span><?php endif; ?></div>
                                                        <div class="cdf-lie"><span class="p-price">￥<?php echo $this->_var['vo']['goods_amount']; ?></span> x 1</div>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="tc"><?php echo $this->_var['vo']['order_sn']; ?></td>
                                            <td class="tc"><?php echo $this->_var['vo']['complete']; ?>%</td>
                                            <td class="tc">￥<?php echo $this->_var['vo']['join_money']; ?></td>
                                            <td class="tc"><?php echo $this->_var['vo']['surplus_time']; ?> <?php echo $this->_var['lang']['day']; ?></td>
                                            <td class="tc">
                                                <?php if ($this->_var['vo']['surplus_time'] != 0 && $this->_var['vo']['pay_status'] == 0): ?>
                                                    <a target="_blank" href="user.php?act=order_detail&order_id=<?php echo $this->_var['vo']['order_id']; ?>" class="sc-btn"><?php echo $this->_var['lang']['go_pay']; ?></a>
                                                <?php elseif ($this->_var['vo']['surplus_time'] != 0 && $this->_var['vo']['pay_status'] == 1): ?>
                                                    <p><?php echo $this->_var['lang']['cs']['1']; ?></p>                                    
                                                <?php elseif ($this->_var['vo']['surplus_time'] != 0 && $this->_var['vo']['pay_status'] == 2): ?>
                                                    <p><?php echo $this->_var['lang']['ps']['2']; ?></p>
                                                <?php elseif ($this->_var['vo']['surplus_time'] == 0 && $this->_var['vo']['pay_status'] == 2): ?>
                                                    <p><?php echo $this->_var['lang']['ps']['2']; ?></p>
                                                    <p><?php echo $this->_var['lang']['has_ended']; ?></p>
                                                <?php else: ?>
                                                    <p><?php echo $this->_var['lang']['has_ended']; ?></p>
                                                <?php endif; ?>
                                                
                                                <?php if ($this->_var['vo']['shipping_status'] == 0): ?>
                                                <p><?php echo $this->_var['lang']['ss']['0']; ?></p>
                                                <?php elseif ($this->_var['vo']['shipping_status'] == 5): ?>
                                                <p><?php echo $this->_var['lang']['zc_ss']; ?></p>                                           
                                                <?php elseif ($this->_var['vo']['shipping_status'] == 1): ?>
                                                <p><?php echo $this->_var['lang']['ss']['1']; ?></p>
                                                <a target="_blank" class="sc-btn" href="user.php?act=affirm_received&order_id=<?php echo $this->_var['vo']['order_id']; ?>" onclick="if (!confirm('你确认已经收到货物了吗？')) return false;">确认收货</a>
                                                <?php elseif ($this->_var['vo']['shipping_status'] == 2): ?>
                                                <p><?php echo $this->_var['lang']['Received_goods']; ?></p>
                                                <?php endif; ?> 
                                            </td>
                                        </tr>
                                    <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
                                    </tbody>
                                </table>
                            </div>
                            <?php else: ?>
                                <div class="no_records">
                                    <i class="no_icon_two"></i>
                                    <div class="no_info no_info_line">
                                        <h3><?php 
$k = array (
  'name' => 'get_page_no_records',
  'filename' => $this->_var['filename'],
  'act' => $this->_var['action'],
);
echo $this->_echash . $k['name'] . '|' . serialize($k) . $this->_echash;
?></h3>
                                        <div class="no_btn"><a href="crowdfunding.php" class="sc-btn"><?php echo $this->_var['lang']['zc_home']; ?></a></div>
                                    </div>
                                </div>
                            <?php endif; ?>
                        </div>
                        <div class="pay_item" style="display: none;">
                            <?php if ($this->_var['zc_support_list_yes_pay']): ?>
                            <div class="crowdfunding-list">
                                <table class="user-table user-table-cdf">
                                    <colgroup>
                                        <col width="350">
                                        <col width="100">
                                        <col width="100">
                                        <col width="100">
                                        <col width="100">
                                        <col>
                                    </colgroup>
                                    <thead>
                                        <tr>
                                            <th><?php echo $this->_var['lang']['Project_info']; ?></th>
                                            <th>订单号</th>
                                            <th>已完成</th>
                                            <th><?php echo $this->_var['lang']['zc_raise']; ?></th>
                                            <th><?php echo $this->_var['lang']['residual_time']; ?></th>
                                            <th><?php echo $this->_var['lang']['handle']; ?></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php $_from = $this->_var['zc_support_list_yes_pay']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'vo');if (count($_from)):
    foreach ($_from AS $this->_var['vo']):
?>
                                        <tr>
                                            <td>
                                                <div class="cdf-goods">
                                                    <div class="cdf-img"><a href="crowdfunding.php?act=detail&id=<?php echo $this->_var['vo']['id']; ?>"><img src="<?php echo $this->_var['vo']['title_img']; ?>"></a></div>
                                                    <div class="cdf-info">
                                                        <div class="cdf-name"><a href="#"><?php echo $this->_var['vo']['title']; ?></a><?php if ($this->_var['vo']['surplus_time'] != 0): ?><span class="hand"><?php echo $this->_var['lang']['zc_in']; ?></span><?php else: ?><span><?php echo $this->_var['lang']['has_ended']; ?></span><?php endif; ?></div>
                                                        <div class="cdf-lie"><span class="p-price">￥<?php echo $this->_var['vo']['goods_amount']; ?></span> x 1</div>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="tc"><?php echo $this->_var['vo']['order_sn']; ?></td>
                                            <td class="tc"><?php echo $this->_var['vo']['complete']; ?>%</td>
                                            <td class="tc">￥<?php echo $this->_var['vo']['join_money']; ?></td>
                                            <td class="tc"><?php echo $this->_var['vo']['surplus_time']; ?> <?php echo $this->_var['lang']['day']; ?></td>
                                            <td class="tc">
                                                <?php if ($this->_var['vo']['surplus_time'] != 0 && $this->_var['vo']['pay_status'] == 0): ?>
                                                    <a target="_blank" href="user.php?act=order_detail&order_id=<?php echo $this->_var['vo']['order_id']; ?>" class="sc-btn"><?php echo $this->_var['lang']['go_pay']; ?></a>
                                                <?php elseif ($this->_var['vo']['surplus_time'] != 0 && $this->_var['vo']['pay_status'] == 1): ?>
                                                    <p><?php echo $this->_var['lang']['cs']['1']; ?></p>                                            
                                                <?php elseif ($this->_var['vo']['surplus_time'] != 0 && $this->_var['vo']['pay_status'] == 2): ?>
                                                    <p><?php echo $this->_var['lang']['ps']['2']; ?></p>
                                                <?php elseif ($this->_var['vo']['surplus_time'] == 0 && $this->_var['vo']['pay_status'] == 2): ?>
                                                    <p><?php echo $this->_var['lang']['ps']['2']; ?></p>
                                                    <p><?php echo $this->_var['lang']['has_ended']; ?></p>
                                                <?php else: ?>
                                                    <p><?php echo $this->_var['lang']['has_ended']; ?></p>
                                                <?php endif; ?>
                                                <?php if ($this->_var['vo']['shipping_status'] == 0): ?>
                                                <p><?php echo $this->_var['lang']['ss']['0']; ?></p>
                                                <?php elseif ($this->_var['vo']['shipping_status'] == 5): ?>
                                                <p><?php echo $this->_var['lang']['zc_ss']; ?></p>                                           
                                                <?php elseif ($this->_var['vo']['shipping_status'] == 1): ?>
                                                <p><?php echo $this->_var['lang']['ss']['1']; ?></p>
                                                <a target="_blank" class="sc-btn" href="user.php?act=affirm_received&order_id=<?php echo $this->_var['vo']['order_id']; ?>" onclick="if (!confirm('你确认已经收到货物了吗？')) return false;">确认收货</a>
                                                <?php elseif ($this->_var['vo']['shipping_status'] == 2): ?>
                                                <p><?php echo $this->_var['lang']['Received_goods']; ?></p>
                                                <?php endif; ?>   
                                            </td>
                                        </tr>
                                    <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
                                    </tbody>
                                </table>
                            </div>
                            <?php else: ?>
                                <div class="no_records">
                                    <i class="no_icon_two"></i>
                                    <div class="no_info no_info_line">
                                        <h3><?php 
$k = array (
  'name' => 'get_page_no_records',
  'filename' => $this->_var['filename'],
  'act' => $this->_var['action'],
);
echo $this->_echash . $k['name'] . '|' . serialize($k) . $this->_echash;
?></h3>
                                        <div class="no_btn"><a href="crowdfunding.php" class="sc-btn"><?php echo $this->_var['lang']['zc_home']; ?></a></div>
                                    </div>
                                </div>
                            <?php endif; ?>
                        </div>
                        <div class="pay_item" style="display: none;">
                            <?php if ($this->_var['zc_support_list_no_pay']): ?>
                            <div class="crowdfunding-list">
                                <table class="user-table user-table-cdf">
                                    <colgroup>
                                        <col width="350">
                                        <col width="100">
                                        <col width="100">
                                        <col width="100">
                                        <col width="100">
                                        <col>
                                    </colgroup>
                                    <thead>
                                        <tr>
                                            <th><?php echo $this->_var['lang']['Project_info']; ?></th>
                                            <th>订单号</th>
                                            <th>已完成</th>
                                            <th><?php echo $this->_var['lang']['zc_raise']; ?></th>
                                            <th><?php echo $this->_var['lang']['residual_time']; ?></th>
                                            <th><?php echo $this->_var['lang']['handle']; ?></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php $_from = $this->_var['zc_support_list_no_pay']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'vo');if (count($_from)):
    foreach ($_from AS $this->_var['vo']):
?>
                                        <tr>
                                            <td>
                                                <div class="cdf-goods">
                                                    <div class="cdf-img"><a href="crowdfunding.php?act=detail&id=<?php echo $this->_var['vo']['id']; ?>"><img src="<?php echo $this->_var['vo']['title_img']; ?>"></a></div>
                                                    <div class="cdf-info">
                                                        <div class="cdf-name"><a href="#"><?php echo $this->_var['vo']['title']; ?></a><?php if ($this->_var['vo']['surplus_time'] != 0): ?><span class="hand"><?php echo $this->_var['lang']['zc_in']; ?></span><?php else: ?><span><?php echo $this->_var['lang']['has_ended']; ?></span><?php endif; ?></div>
                                                        <div class="cdf-lie"><span class="p-price">￥<?php echo $this->_var['vo']['goods_amount']; ?></span> x 1</div>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="tc"><?php echo $this->_var['vo']['order_sn']; ?></td>
                                            <td class="tc"><?php echo $this->_var['vo']['complete']; ?>%</td>
                                            <td class="tc">￥<?php echo $this->_var['vo']['join_money']; ?></td>
                                            <td class="tc"><?php echo $this->_var['vo']['surplus_time']; ?> <?php echo $this->_var['lang']['day']; ?></td>
                                            <td class="tc">
                                                <?php if ($this->_var['vo']['surplus_time'] != 0 && $this->_var['vo']['pay_status'] == 0): ?>
                                                    <a target="_blank" href="user.php?act=order_detail&order_id=<?php echo $this->_var['vo']['order_id']; ?>" class="sc-btn"><?php echo $this->_var['lang']['go_pay']; ?></a>
                                                <?php elseif ($this->_var['vo']['surplus_time'] != 0 && $this->_var['vo']['pay_status'] == 1): ?>
                                                    <span><?php echo $this->_var['lang']['cs']['1']; ?></span>                                            
                                                <?php elseif ($this->_var['vo']['surplus_time'] != 0 && $this->_var['vo']['pay_status'] == 2): ?>
                                                    <span><?php echo $this->_var['lang']['ps']['2']; ?></span>
                                                <?php elseif ($this->_var['vo']['surplus_time'] == 0 && $this->_var['vo']['pay_status'] == 2): ?>
                                                    <span><?php echo $this->_var['lang']['ps']['2']; ?></span><br/>
                                                    <span><?php echo $this->_var['lang']['has_ended']; ?></span>
                                                <?php else: ?>
                                                    <span><?php echo $this->_var['lang']['has_ended']; ?></span>
                                                <?php endif; ?>
                                                <?php if ($this->_var['vo']['shipping_status'] == 0): ?>
                                                <span><?php echo $this->_var['lang']['ss']['0']; ?></span>
                                                <?php elseif ($this->_var['vo']['shipping_status'] == 5): ?>
                                                <span><?php echo $this->_var['lang']['zc_ss']; ?></span>                                           
                                                <?php elseif ($this->_var['vo']['shipping_status'] == 1): ?>
                                                <span><?php echo $this->_var['lang']['ss']['1']; ?></span>
                                                <a target="_blank" class="sc-btn" href="user.php?act=affirm_received&order_id=<?php echo $this->_var['vo']['order_id']; ?>" onclick="if (!confirm('你确认已经收到货物了吗？')) return false;">确认收货</a>
                                                <?php elseif ($this->_var['vo']['shipping_status'] == 2): ?>
                                                <span><?php echo $this->_var['lang']['Received_goods']; ?></span>
                                                <?php endif; ?> 
                                            </td>
                                        </tr>
                                    <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
                                    </tbody>
                                </table>
                            </div>
                            <?php else: ?>
                                <div class="no_records">
                                    <i class="no_icon_two"></i>
                                    <div class="no_info no_info_line">
                                        <h3><?php 
$k = array (
  'name' => 'get_page_no_records',
  'filename' => $this->_var['filename'],
  'act' => $this->_var['action'],
);
echo $this->_echash . $k['name'] . '|' . serialize($k) . $this->_echash;
?></h3>
                                        <div class="no_btn"><a href="crowdfunding.php" class="sc-btn"><?php echo $this->_var['lang']['zc_home']; ?></a></div>
                                    </div>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="my_box" style="display:none;">
                        <?php if (! empty ( $this->_var['zc_focus_list'] [ 0 ] )): ?>
                            <div class="crowdfunding-list">
                                <table class="user-table user-table-cdf">
                                    <colgroup>
                                        <col width="350">
                                        <col width="100">
                                        <col width="100">
                                        <col width="100">
                                        <col>
                                    </colgroup>
                                    <thead>
                                        <tr>
                                            <th><?php echo $this->_var['lang']['Project_info']; ?></th>
                                            <th><?php echo $this->_var['lang']['zc_number']; ?></th>
                                            <th><?php echo $this->_var['lang']['gz_number']; ?></th>
                                            <th><?php echo $this->_var['lang']['handle']; ?></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php $_from = $this->_var['zc_focus_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'vo');if (count($_from)):
    foreach ($_from AS $this->_var['vo']):
?>
                                        <tr>
                                            <td>
                                                <div class="cdf-goods">
                                                    <div class="cdf-img"><a href="crowdfunding.php?act=detail&id=<?php echo $this->_var['vo']['id']; ?>"><img src="<?php echo $this->_var['vo']['title_img']; ?>"></a></div>
                                                    <div class="cdf-info">
                                                        <div class="cdf-name"><a href="#"><?php echo $this->_var['vo']['title']; ?></a><?php if ($this->_var['vo']['surplus_time'] != 0): ?><span class="hand"><?php echo $this->_var['lang']['zc_in']; ?></span><?php else: ?><span><?php echo $this->_var['lang']['has_ended']; ?></span><?php endif; ?></div>
                                                        <div class="cdf-lie"><span class="p-price">￥<?php echo $this->_var['vo']['goods_amount']; ?></span> x 1</div>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="tc"><?php echo empty($this->_var['vo']['zhichi_num']) ? '0' : $this->_var['vo']['zhichi_num']; ?></td>
                                            <td class="tc"><?php echo empty($this->_var['vo']['focus_num']) ? '0' : $this->_var['vo']['focus_num']; ?></td>
                                            <td class="tc">
                                               <?php if ($this->_var['vo']['surplus_time'] > 0): ?>
                                               <a target="_blank" class="sc-btn" href="crowdfunding.php?act=detail&id=<?php echo $this->_var['vo']['id']; ?>"><?php echo $this->_var['lang']['To_support']; ?></a>
                                               <br/>
                                               <a href="javascript:void(0);" class="sc-btn" data-dialog="zc_focus_dialog" data-divid="zc_focus_dialog" data-url="user.php?act=delete_zc_focus&rec_id=<?php echo $this->_var['vo']['id']; ?>"><?php echo $this->_var['lang']['no_attention']; ?></a>
                                               <!--<a href="crowdfunding.php?act=rm_focus&id=<?php echo $this->_var['vo']['id']; ?>">取消关注</a>-->
                                               <?php else: ?>
                                               <span><?php echo $this->_var['lang']['has_ended']; ?></span>
                                               <?php endif; ?>
                                            </td>
                                        </tr>
                                    <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
                                    </tbody>
                                </table>
                            </div>
                        <?php else: ?>
                            <div class="no_records">
                                <i class="no_icon_two"></i>
                                <div class="no_info no_info_line">
                                    <h3><?php 
$k = array (
  'name' => 'get_page_no_records',
  'filename' => $this->_var['filename'],
  'act' => $this->_var['action'],
);
echo $this->_echash . $k['name'] . '|' . serialize($k) . $this->_echash;
?></h3>
                                    <div class="no_btn"><a href="crowdfunding.php" class="sc-btn"><?php echo $this->_var['lang']['zc_home']; ?></a></div>
                                </div>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
        <?php endif; ?>
        
        
        
        <?php if ($this->_var['action'] == 'wholesale_buy'): ?>
        <div class="user-mod">
            <div class="user-title">
                <h2><?php echo $this->_var['lang']['my_purchase_order']; ?></h2>
            </div>
            <div class="user-list-title clearfix">
                <div class="user-list-filter">
                    <div class="imitate_select w120 mr10" id="wholesale_order_status">
                        <div class="cite"><span><?php echo $this->_var['lang']['all_status']; ?></span><i class="iconfont icon-down"></i></div>
                        <ul>
                            <li id="wholesale_order_status_-1"><a href="javascript:void(0);" data-idtxt="wholesale_status_list" data-action="<?php echo $this->_var['action']; ?>" data-type="order_status" data-id="-1" data-value='-1'><?php echo $this->_var['lang']['all_status']; ?></a></li>
                            <li id="wholesale_order_status_0"><a href="javascript:void(0);" data-idtxt="wholesale_status_list" data-action="<?php echo $this->_var['action']; ?>" data-type="order_status" data-id="0" data-value='0'>未完成</a></li>
                            <li id="wholesale_order_status_1"><a href="javascript:void(0);" data-idtxt="wholesale_status_list" data-action="<?php echo $this->_var['action']; ?>" data-type="order_status" data-id="1" data-value='1'>已完成</a></li>
                        </ul>
                        <input name="wholesale_order_status_list" type="hidden" value="-1" id="wholesale_order_status_val">
                    </div>
                    <div class="imitate_select w120" id="DateTime">
                        <div class="cite"><span><?php echo $this->_var['lang']['all_time']; ?></span><i class="iconfont icon-down"></i></div>
                        <ul>
                            <li id="time_allDate"><a href="javascript:void(0);" data-idtxt="wholesale_submitDate" data-action="<?php echo $this->_var['action']; ?>" data-type="dateTime" data-id="allDate" data-value="allDate"><?php echo $this->_var['lang']['all_time']; ?></a></li>
                            <li id="time_today"><a href="javascript:void(0);" data-idtxt="wholesale_submitDate" data-action="<?php echo $this->_var['action']; ?>" data-type="dateTime" data-id="today" data-value="today"><?php echo $this->_var['lang']['Today']; ?></a></li>
                            <li id="time_three_today"><a href="javascript:void(0);" data-idtxt="wholesale_submitDate" data-action="<?php echo $this->_var['action']; ?>" data-type="dateTime" data-id="three_today" data-value="three_today"><?php echo $this->_var['lang']['three_today']; ?></a></li>
                            <li id="time_aweek"><a href="javascript:void(0);" data-idtxt="wholesale_submitDate" data-action="<?php echo $this->_var['action']; ?>" data-type="dateTime" data-id="aweek" data-value="aweek"><?php echo $this->_var['lang']['aweek']; ?></a></li>
                            <li id="time_thismonth"><a href="javascript:void(0);" data-idtxt="wholesale_submitDate" data-action="<?php echo $this->_var['action']; ?>" data-type="dateTime" data-id="thismonth" data-value="thismonth"><?php echo $this->_var['lang']['thismonth']; ?></a></li>
                        </ul>
                        <input name="wholesale_order_submitDate" type="hidden" value="allDate" id="wholesale_dateTime_val">
                    </div>
                </div>
                <form class="user-list-search">
                    <input type="text" id="ip_keyword" class="text" onkeydown="javascript:if(event.keyCode==13) OrderSearch('ip_keyword');" onblur="if (this.value=='') this.value=this.defaultValue; this.style.color='#999'" onfocus="if (this.value==this.defaultValue)this.value='';this.style.color='#666'" placeholder="输入商品名称或者订单号搜索" name="" style="color: rgb(153, 153, 153);">
                    <button type="button" onclick="get_WholesaleOrderSearch('ip_keyword', 'order_list', 'text')"><i class="iconfont icon-search"></i></button>
                </form>
            </div>
            <div id="user_order_list">
            <?php echo $this->fetch('library/user_wholesale_order_list.lbi'); ?>
            </div>
        </div>
        <script type="text/javascript">
            //删除                                                                                                                                                                                                                                                                                                  //
            function delete_wholesale_order(order_id){
                var order = new Object();
                order.order_id   = order_id; 
				pbDialog("是否确定删除采购单？","",0,"","","",true,function(){
					Ajax.call('user.php?act=delete_wholesale_order', 'order=' + $.toJSON(order), orderResponse, 'POST', 'JSON');
				});
            } 
            //查询
            function get_WholesaleOrderSearch(idTxt, action, type, t, c){
                    
                var keyword, status_keyword, date_keyword;  
                var order = new Object();
                if(t){
                    keyword = $(t).data('id');

                    if(idTxt == 'wholesale_status_list'){
                        $("input[name='wholesale_order_status_list']").val(keyword);
                    }else if(idTxt == 'wholesale_submitDate'){
                        $("input[name='wholesale_order_submitDate']").val(keyword);
                    }

                }else{
                    keyword = document.getElementById(idTxt).value;
                }
        
                //by sun
                if(c){
                    $(c).addClass("active").siblings().removeClass("active");
                }
                //by sun end
                    
                if(idTxt == 'submitDate'){
                    var status_keyword = $("input[name='wholesale_order_status_list']").val();
                    order.status_keyword   = status_keyword; 
                }else if(idTxt == 'status_list'){
                    var date_keyword = $("input[name='wholesale_order_submitDate']").val();
                    order.date_keyword   = date_keyword; 
                }
                    
                order.idTxt   = idTxt; 
                order.keyword   = keyword; 
                order.action   = action; 
                order.type   = type; 

                Ajax.call('user.php?act=wholesale_order_to_query', 'order=' + $.toJSON(order), orderResponse, 'POST', 'JSON');
            }
            
            function orderResponse(result){
                if(result.error == 0){
                    $("#user_order_list").html(result.content);
                }
            }
        </script>  
        <?php endif; ?>
            
        <?php if ($this->_var['action'] == 'wholesale_purchase'): ?>
        <div class="user-mod">
            <div class="user-title">
                <h2><?php echo $this->_var['lang']['want_buy_order']; ?></h2>
                <ul class="tabs" ectype="review_status">
                    <li <?php if ($_GET['review_status'] == ''): ?>class="active"<?php endif; ?> data-value=""><a href="javascript:void(0);"><?php echo $this->_var['lang']['all_status']; ?>(<?php echo $this->_var['review_status_array']['-1']; ?>)</a></li>
                    <li <?php if ($_GET['review_status'] == '1'): ?>class="active"<?php endif; ?> data-value="1"><a href="javascript:void(0);"><?php echo $this->_var['lang']['is_confirm']['1']; ?>(<?php echo $this->_var['review_status_array']['1']; ?>)</a></li>
                    <li <?php if ($_GET['review_status'] == '2'): ?>class="active"<?php endif; ?> data-value="2"><a href="javascript:void(0);"><?php echo $this->_var['lang']['is_confirm']['2']; ?>(<?php echo $this->_var['review_status_array']['2']; ?>)</a></li>
                    <li <?php if ($_GET['review_status'] == '0'): ?>class="active"<?php endif; ?> data-value="0"><a href="javascript:void(0);"><?php echo $this->_var['lang']['is_confirm']['0']; ?>(<?php echo $this->_var['review_status_array']['0']; ?>)</a></li>
                </ul>
            </div>
            <div class="user-list-title clearfix">
                <div class="user-list-filter user-wantbut-filter">
                    <div class="text_time" id="text_time1">
                        <input type="text" class="text mr0" name="start_date" id="start_date" value="<?php echo $_GET['start_date']; ?>" placeholder="请选择日期" autocomplete="off" readonly>
                    </div>
                    <span class="bolang">&nbsp;&nbsp;~&nbsp;&nbsp;</span>
                    <div class="text_time" id="text_time2">
                        <input type="text" class="text mr0" name="end_date" id="end_date" value="<?php echo $_GET['end_date']; ?>" placeholder="请选择日期" autocomplete="off" readonly>
                    </div>
                </div>
                <form class="user-list-search user-list-search-wantbut">
                    <input type="hidden" name="review_status" value="<?php echo $_GET['review_status']; ?>">
                    <input type="text" id="ip_keyword" class="text" placeholder="输入求购单标题搜索" name="keyword" value="<?php echo $_GET['keyword']; ?>" style="color: rgb(153, 153, 153);">
                    <button type="button" onclick="purchase_search()">搜索</button>
                </form>
            </div>
            <div class="user-wantbut-list">
                <table class="user-table">
                    <colgroup>
                        <col width="300">
                        <col width="300">
                        <col width="140">
                        <col>
                    </colgroup>
                    <thead>
                        <tr>
                            <th>求购商品</th>
                            <th>求购时间</th>
                            <th>审核状态</th>
                            <th>操作</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $_from = $this->_var['purchase_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'purchase');if (count($_from)):
    foreach ($_from AS $this->_var['purchase']):
?>
                        <tr>
                            <td>
                                <div class="p-goods">
                                    <div class="p-img"><a href="wholesale_purchase.php?act=info&purchase_id=<?php echo $this->_var['purchase']['purchase_id']; ?>" target="_blank"><img src="<?php if ($this->_var['purchase']['img']): ?><?php echo $this->_var['purchase']['img']; ?><?php else: ?>themes/<?php echo $GLOBALS['_CFG']['template']; ?>/images/brand_defalut.jpg<?php endif; ?>"></a></div>
                                    <div class="p-info">
                                        <div class="p-name"><a href="wholesale_purchase.php?act=info&purchase_id=<?php echo $this->_var['purchase']['purchase_id']; ?>" target="_blank"><?php echo $this->_var['purchase']['subject']; ?></a></div>
                                        <div class="p-num">求购数量：<?php echo $this->_var['purchase']['goods_number']; ?>件</div>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <div class="p-time">
                                    <p><?php echo $this->_var['purchase']['add_time_complete']; ?> 〜 <?php echo $this->_var['purchase']['end_time_complete']; ?></p>
                                    <p>剩余<?php echo $this->_var['purchase']['left_day']; ?>天</p>
                                </div>
                            </td>
                            <td>
                                <div class="p-state">
                                    <h3 class="ftx-07"><?php echo $this->_var['lang']['review_status'][$this->_var['purchase']['review_status']]; ?></h3>
                                </div>
                            </td>
                            <td>
                                <a href="user.php?act=purchase_info&purchase_id=<?php echo $this->_var['purchase']['purchase_id']; ?>" class="sc-btn">查看</a>
                                <a href="user.php?act=purchase_delete&purchase_id=<?php echo $this->_var['purchase']['purchase_id']; ?>" class="sc-btn">删除</a>
                            </td>
                        </tr>
                        <?php endforeach; else: ?>
                        <tr><td colspan="4">当前还没有求购数据哟</td></tr>
                        <?php endif; unset($_from); ?><?php $this->pop_vars();; ?>
                    </tbody>
                </table>
                <?php echo $this->fetch('library/pages.lbi'); ?>
            </div>
        </div>
        <script type="text/javascript">
        $("[ectype='review_status'] li").click(function(){
			var review_status = $(this).data('value');
			$("input[name='review_status']").val(review_status);
			purchase_search();
        })

        function purchase_search(){
			query_string = "";
			var start_date = $("input[name='start_date']").val();
			var end_date = $("input[name='end_date']").val();
			var keyword = $("input[name='keyword']").val();
			var review_status = $("input[name='review_status']").val();
			if(start_date){query_string += "&start_date="+start_date}
			if(end_date){query_string += "&end_date="+end_date}
			if(keyword){query_string += "&keyword="+keyword}
			if(review_status){query_string += "&review_status="+review_status}
			location.href = 'user.php?act=wholesale_purchase'+query_string;
        }
        </script>
        <?php endif; ?>
        <?php if ($this->_var['action'] == 'purchase_info'): ?>
        <div class="user-mod">
            <form name="formEdit" action="user.php" method="post">
            	<div class="user-title">
                    <h2><?php echo $this->_var['lang']['want_buy_order_desc']; ?></h2>
                </div>
                <div class="user-wantbuy-content">
                    <div class="title">
                    	<h3><?php echo $this->_var['lang']['review_status'][$this->_var['purchase_info']['review_status']]; ?>－<?php echo $this->_var['lang']['purchase_status'][$this->_var['purchase_info']['status']]; ?></h3>
                        <span>距求购结束还剩<em><?php echo $this->_var['purchase_info']['left_day']; ?></em>天</span>
                    </div>
                    <div class="user-wantbuy-table">
                    	<div class="tit"><?php echo $this->_var['purchase_info']['subject']; ?><em><?php echo $this->_var['lang']['purchase_type'][$this->_var['purchase_info']['type']]; ?></em></div>
                        <table class="user-table">
                            <colgroup>
                                <col width="180">
                                <col width="150">
                                <col width="100">
                                <col width="100">
                                <col>
                            </colgroup>
                            <thead>
                            	<tr>
                                    <th>采购商品名称</th>
                                    <th>采购商品分类</th>
                                    <th>采购数量</th>
                                    <th>目标单价</th>
                                    <th>其他备注</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $_from = $this->_var['purchase_info']['goods_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'goods');$this->_foreach['goods'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['goods']['total'] > 0):
    foreach ($_from AS $this->_var['goods']):
        $this->_foreach['goods']['iteration']++;
?>
                            	<tr>
                                    <td><?php echo $this->_var['goods']['goods_name']; ?></td>
                                    <td><div class="tDiv"><?php echo $this->_var['goods']['cat_name']; ?></div></td>
                                    <td><?php echo $this->_var['goods']['goods_number']; ?>件</td>
                                    <td><?php echo $this->_var['goods']['goods_price']; ?>元</td>
                                    <td>
                                    	<div class="t-desc"><span><?php echo $this->_var['goods']['remarks']; ?></span></div>
                                        <div class="t-images">
                                            <div class="t-images-info">
                                                <ul>
                                                    <?php $_from = $this->_var['goods']['goods_img']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'img');if (count($_from)):
    foreach ($_from AS $this->_var['img']):
?>
                                                    <li><img src="<?php echo $this->_var['img']; ?>"><a href="<?php echo $this->_var['img']; ?>" class="nyroModal"><i class="iconfont icon-search"></i></a></li>
                                                    <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
                                                </ul>
                                            </div>
                                            <a href="javascript:void(0);" class="prev"><i class="iconfont icon-left"></i></a>
                                            <a href="javascript:void(0);" class="next"><i class="iconfont icon-right"></i></a>
                                        </div>
                                    </td>
                                </tr>
                                <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
                            </tbody> 
                            <tfoot>
                            	<tr>
                                    <td colspan="5">
                                    	<div class="tfoot-left">
                                            <div class="lie">
                                            	<div class="label">联系人：</div>
                                                <div class="value"><?php echo $this->_var['purchase_info']['contact_name']; ?> <?php echo $this->_var['lang']['contact_gender'][$this->_var['purchase_info']['contact_gender']]; ?></div>
                                            </div>
                                            <div class="lie">
                                            	<div class="label">联系电话：</div>
                                                <div class="value"><?php echo $this->_var['purchase_info']['contact_phone']; ?></div>
                                            </div>
                                            <div class="lie">
                                            	<div class="label">电子邮箱：</div>
                                                <div class="value"><?php echo $this->_var['purchase_info']['contact_email']; ?></div>
                                            </div>
                                        </div>
                                        <div class="tfoot-right">
                                            <div class="lie">
                                            	<div class="label">发票信息：</div>
                                                <div class="value"><?php echo $this->_var['lang']['need_invoice'][$this->_var['purchase_info']['need_invoice']]; ?> <?php if ($this->_var['purchase_info']['invoice_tax_rate']): ?>税率<?php echo $this->_var['purchase_info']['invoice_tax_rate']; ?><?php endif; ?></div>
                                            </div>
                                            <!--<div class="lie">
                                            	<div class="label">收货地区：</div>
                                                <div class="value"><?php echo $this->_var['purchase_info']['consignee_region']; ?></div>
                                            </div>-->
                                            <div class="lie">
                                            	<div class="label">收货地址：</div>
                                                <div class="value"><?php echo $this->_var['purchase_info']['consignee_region']; ?> <?php echo $this->_var['purchase_info']['consignee_address']; ?></div>
                                            </div>											
                                            <div class="lie">
                                            	<div class="label">补充说明：</div>
                                                <div class="value"><?php echo $this->_var['purchase_info']['description']; ?></div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
                
                <div class="user-title">
                    <h2><?php echo $this->_var['lang']['supplier_info']; ?></h2>
                </div>
                <div class="user-supplier-info">
                    <div class="user-items">
						<?php if ($this->_var['purchase_info']['status'] != 1): ?>
                    	<div class="item">
                            <div class="label">公司名称：</div>
                            <div class="value"><input type="text" name="supplier_company_name" value="<?php echo $this->_var['purchase_info']['supplier_company_name']; ?>" class="text"></div>
                        </div>
                        <div class="item">
                            <div class="label">联系电话：</div>
                            <div class="value"><input type="text" name="supplier_contact_phone" value="<?php echo $this->_var['purchase_info']['supplier_contact_phone']; ?>" class="text"></div>
                        </div>
						<?php else: ?>
						<div class="item">
                            <div class="label">公司名称：</div>
                            <div class="value"><span class="lh30"><?php echo $this->_var['purchase_info']['supplier_company_name']; ?></span></div>
                        </div>
                        <div class="item">
                            <div class="label">联系电话：</div>
                            <div class="value"><span class="lh30"><?php echo $this->_var['purchase_info']['supplier_contact_phone']; ?></span></div>
                        </div>
						<?php endif; ?>
                        <?php if ($this->_var['purchase_info']['status'] != 1): ?>
                        <div class="item item-button">
                            <div class="label">&nbsp;</div>
                            <div class="value">
                                <input type="hidden" name="purchase_id" value="<?php echo $this->_var['purchase_info']['purchase_id']; ?>">
                                <input type="hidden" name="act" value="purchase_edit">
                            	<input type="submit" class="sc-btn sc-redBg-btn" name="submit" value="完成求购单">
                            </div>
                        </div>
                        <?php endif; ?>
                    </div>
                </div>
            </form>
        </div>
        <?php endif; ?>
        
    </div>
</div>
    
<?php echo $this->fetch('library/page_footer.lbi'); ?>
<?php echo $this->smarty_insert_scripts(array('files'=>'jquery.SuperSlide.2.1.1.js,jquery.yomi.js,common.js,./sms/sms.js,jquery.validation.min.js,additional-methods.js,jquery.nyroModal.js,perfect-scrollbar/perfect-scrollbar.min.js,calendar.php,plupload.full.min.js')); ?>
<?php if ($this->_var['action'] == 'profile'): ?>
<?php echo $this->smarty_insert_scripts(array('files'=>'amazeui/amazeui.min.js,cropper/cropper.min.js')); ?>
<?php endif; ?>
<?php if ($this->_var['action'] == "account_raply"): ?>
<?php endif; ?>
<script type="text/javascript" src="themes/<?php echo $GLOBALS['_CFG']['template']; ?>/js/jquery.purebox.js"></script>
<script type="text/javascript" src="themes/<?php echo $GLOBALS['_CFG']['template']; ?>/js/region.js"></script>
<script type="text/javascript" src="themes/<?php echo $GLOBALS['_CFG']['template']; ?>/js/dsc-common.js"></script>

<script type="text/javascript">
$(function(){
	//tab切换
	$("*[ectype='tabSection']").slide({titCell:"*[ectype='tabs'] li",mainCell:"*[ectype='tabContent']",trigger:"click",titOnClassName:"active"});
	
	//查看图片
	$(".nyroModal").nyroModal();
	
	if(document.getElementById("seccode")){
		$("#seccode").val(<?php echo empty($this->_var['sms_security_code']) ? '0' : $this->_var['sms_security_code']; ?>);
	}
	
	//微信扫码弹出框
	$("[data-type='wxpay']").on("click",function(){
		var content = $("#wxpay_dialog").html();
		pb({
			id: "scanCode",
			title: "",
			width: 716,
			content: content,
			drag: true,
			foot: false,
			cl_cBtn: false,
			cBtn: false
		});
	});
	
	//优惠券列表数量过多时添加滚动轴
	$(".coupons-items").perfectScrollbar("destroy");
	$(".coupons-items").perfectScrollbar();
});
<?php if ($this->_var['action'] == 'address'): ?>
<?php if ($this->_var['address_id'] > 0): ?>$.levelLink();<?php else: ?>$.levelLink(1);<?php endif; ?>
<?php endif; ?>
</script>



<?php if ($this->_var['action'] == 'snatch_list'): ?>
<script>
	function get_SnatchSearch(idTxt, action, type, t, c){
		var keyword, status_keyword, date_keyword;  
		var snatch = new Object();
		if(t){
			keyword = $(t).data('id');
			
			if(idTxt == 'status_list'){
				$("input[name='order_status_list']").val(keyword);
			}else if(idTxt == 'submitDate'){
				$("input[name='order_submitDate']").val(keyword);
			}
		}else{
			keyword = document.getElementById(idTxt).value;
		}

		if(c){
			$(c).addClass("active").siblings().removeClass("active");
		}
		
		if(idTxt == 'submitDate'){
			var status_keyword = $("input[name='order_status_list']").val();
			snatch.status_keyword = status_keyword;
		}else if(idTxt == 'status_list'){
			var date_keyword = $("input[name='order_submitDate']").val();
			snatch.date_keyword = date_keyword;
		}
		
		snatch.idTxt = idTxt;
		snatch.keyword = keyword;
		snatch.action = action;
		snatch.type = type;

		Ajax.call('user.php?act=snatch_to_query', 'snatch=' + $.toJSON(snatch), auctionResponse, 'POST', 'JSON');
	}
	
	function auctionResponse(result){
		if(result.error == 0){
			$("#user-snatch-list").html(result.content);
		}
	}
</script>
<?php endif; ?>

<?php if ($this->_var['action'] == 'auction_list'): ?>
<script>
	function get_AuctionSearch(idTxt, action, type, t, c){
		var keyword, status_keyword, date_keyword;  
		var auction = new Object();
		if(t){
			keyword = $(t).data('id');
			
			if(idTxt == 'status_list'){
				$("input[name='order_status_list']").val(keyword);
			}else if(idTxt == 'submitDate'){
				$("input[name='order_submitDate']").val(keyword);
			}
		}else{
			keyword = document.getElementById(idTxt).value;
		}

		if(c){
			$(c).addClass("active").siblings().removeClass("active");
		}
		
		if(idTxt == 'submitDate'){
			var status_keyword = $("input[name='order_status_list']").val();
			auction.status_keyword = status_keyword;
		}else if(idTxt == 'status_list'){
			var date_keyword = $("input[name='order_submitDate']").val();
			auction.date_keyword = date_keyword;
		}
		
		auction.idTxt = idTxt;
		auction.keyword = keyword;
		auction.action = action;
		auction.type = type;

		Ajax.call('user.php?act=auction_to_query', 'auction=' + $.toJSON(auction), auctionResponse, 'POST', 'JSON');
	}
	
	function auctionResponse(result){
		if(result.error == 0){
			$("#user-auction-list").html(result.content);
		}
	}
</script>
<?php endif; ?>

<?php if ($this->_var['action'] == 'order_list' || $this->_var['action'] == 'order_recycle' || $this->_var['action'] == 'auction'): ?>
<script type="text/javascript">
	<?php if ($this->_var['order_type']): ?>
	$(function(){
		if(<?php echo $this->_var['order_where']; ?> == 1){
			get_OrderSearch('to_unconfirmed', '<?php echo $this->_var['action']; ?>', 'toBe_unconfirmed')
		}else if(<?php echo $this->_var['order_where']; ?> == 2){
			get_OrderSearch('payId', '<?php echo $this->_var['action']; ?>', 'toBe_pay')
		}else if(<?php echo $this->_var['order_where']; ?> == 3){
			get_OrderSearch('to_confirm_order', '<?php echo $this->_var['action']; ?>', 'toBe_confirmed')
		}else if(<?php echo $this->_var['order_where']; ?> == 4){
			get_OrderSearch('to_finished', '<?php echo $this->_var['action']; ?>', 'toBe_finished')
		}
	});
	<?php endif; ?>
	
	//删除、还原、永久性删除订单 start
	function get_order_delete_restore(action, order_id){
		var order = new Object();
		var firm;

		if(action == 'delete'){
			firm = json_languages.operation_order_one;
		}else if(action == 'restore'){
			firm = json_languages.operation_order_two;
		}else if(action == 'thorough'){
			firm = json_languages.operation_order_three;
		}
		
		order.order_id = order_id; 
		order.action  = action; 
		<?php if ($this->_var['action'] == 'auction'): ?>
		order.act = 'auction';
		<?php else: ?>
		order.act = 'order_list';
		<?php endif; ?>

		if(confirm(firm)){
			Ajax.call('user.php?act=order_delete_restore', 'order=' + $.toJSON(order), orderResponse, 'POST', 'JSON');
		}
	}
	
	//删除、还原、永久性删除订单 end
	
	
	//by wang 修改过
	function get_OrderSearch(idTxt, action, type, t, c){
		var keyword, status_keyword, date_keyword;  
		var order = new Object();
		if(t){
			keyword = $(t).data('id');
			
			if(idTxt == 'status_list'){
				$("input[name='order_status_list']").val(keyword);
			}else if(idTxt == 'submitDate'){
				$("input[name='order_submitDate']").val(keyword);
			}
		}else{
			keyword = document.getElementById(idTxt).value;
		}

		if(c){
			$(c).addClass("active").siblings().removeClass("active");
		}
		
		if(idTxt == 'submitDate'){
			var status_keyword = $("input[name='order_status_list']").val();
			order.status_keyword = status_keyword;
		}else if(idTxt == 'status_list'){
			var date_keyword = $("input[name='order_submitDate']").val();
			order.date_keyword = date_keyword;
		}
		
		order.idTxt = idTxt;
		order.keyword = keyword;
		order.action = action;
		order.type = type;

		Ajax.call('user.php?act=order_to_query', 'order=' + $.toJSON(order), orderResponse, 'POST', 'JSON');
	}
	
	function orderResponse(result){
		if(result.error == 0){
			$("#user_order_list").html(result.content);
		}
	}
</script>
<?php endif; ?>

<?php if ($this->_var['action'] == 'address_list'): ?>
<script type="text/javascript">
function alertDelAddressDiag(address_id){
	pbDialog(json_languages.delete_consignee,"",0,490,"","",true,function(){
		Ajax.call('user.php?act=ajax_del_address', 'address_id=' + address_id, delAddressResponse, 'GET', 'JSON');
	});
}

function delAddressResponse(res){
	$(".consignee_list_"+res.address_id).remove();
}

//设置默认收获地址
function makeAddressAllDefault(address_id){
	pbDialog(json_languages.default_consignee,"",0,490,"","",true,function(){
		Ajax.call('user.php?act=ajax_make_address', 'address_id=' + address_id, makeAddressResponse, 'GET', 'JSON');
	});
}

function makeAddressResponse(res){
	location.reload();
}
</script>
<?php endif; ?>

<?php if ($this->_var['action'] == 'bonus'): ?>
<script type="text/javascript">
	function new_addBonus(){
		var bns = new Object;
		
		bns.bonus_sn = $(".txt_input_cardnum").val();
		bns.password = $(".txt_input_cardpw").val();
		bns.captcha = $(":input[name='captcha']").val();
		
		if(bns.bonus_sn == ''){
			message = json_languages.card_number_null;
		}else if(bns.password == ''){
			message = json_languages.Real_name_password_null;
		}else if(bns.captcha == ''){
			message = json_languages.null_captcha_login;
		}
		
		if(bns.bonus_sn != '' && bns.password != '' && bns.captcha != ''){
			Ajax.call('user.php', 'act=act_add_bonus&bns=' + $.toJSON(bns), function(data){
				if(data.error == 2){
					pbDialog(data.message,"",0,"","","",true,function(){
						location.href = "user.php";
					});
				}else if(data.error == 3){
					pbDialog(data.message,"",0);
				}else if(data.error == 0){
					pbDialog(data.message,"",1,"","","",true,function(){
						location.href = "user.php?act=bonus";
					});
				}else{
					pbDialog(data.message,"",0);
				}
			}, 'POST', 'JSON');
		}else{
			pbDialog(message,"",0);
		}
	}
</script>
<?php endif; ?>

<?php if ($this->_var['action'] == 'order_list' || $this->_var['action'] == 'auction'): ?>
<script type="text/javascript">
	$.divselect("#order_status","#order_status_val",function(){
		var order    = new Object();
		var key		 = $("#order_status_val").val();
		var date_keyword = $("input[name='order_submitDate']").val();

		order.idTxt   	= $("#order_status_"+key+" a").attr('data-idTxt'); 
		order.keyword   = $("#order_status_"+key+" a").attr('data-id'); 
		order.action  	= $("#order_status_"+key+" a").attr('data-action'); 
		order.type   	= $("#order_status_"+key+" a").attr('data-type'); 
		order.date_keyword   = date_keyword; 	
		
		Ajax.call('user.php?act=order_to_query', 'order=' + $.toJSON(order), orderResponse, 'POST', 'JSON');
	});
	
	$.divselect("#dateTime","#dateTime_val",function(){
		var order    = new Object();
		var key		 = $("#dateTime_val").val();
		var status_keyword = $("input[name='order_status_list']").val();

		order.idTxt   	= $("#time_"+key+" a").attr('data-idTxt'); 
		order.keyword   = $("#time_"+key+" a").attr('data-id'); 
		order.action  	= $("#time_"+key+" a").attr('data-action'); 
		order.type   	= $("#time_"+key+" a").attr('data-type'); 
		order.status_keyword   = status_keyword; 	
		
		Ajax.call('user.php?act=order_to_query', 'order=' + $.toJSON(order), orderResponse, 'POST', 'JSON');
	});
</script>
<?php endif; ?>


<?php if ($this->_var['action'] == 'wholesale_buy'): ?>
<script type="text/javascript">
$.divselect("#wholesale_order_status","#wholesale_order_status_val",function(){
	var order    = new Object();
	var key		 = $("#wholesale_order_status_val").val();
	var date_keyword = $("input[name='wholesale_order_submitDate']").val();

	order.idTxt   	= $("#wholesale_order_status_"+key+" a").attr('data-idTxt'); 
	order.keyword   = $("#wholesale_order_status_"+key+" a").attr('data-id'); 
	order.action  	= $("#wholesale_order_status_"+key+" a").attr('data-action'); 
	order.type   	= $("#wholesale_order_status_"+key+" a").attr('data-type'); 
	order.date_keyword   = date_keyword; 	

	Ajax.call('user.php?act=wholesale_order_to_query', 'order=' + $.toJSON(order), orderResponse, 'POST', 'JSON');
});

$.divselect("#DateTime","#wholesale_dateTime_val",function(){
	var order    = new Object();
	var key		 = $("#wholesale_dateTime_val").val();
	var status_keyword = $("input[name='wholesale_order_submitDate']").val();
	order.idTxt   	= $("#time_"+key+" a").attr('data-idTxt'); 
	order.keyword   = $("#time_"+key+" a").attr('data-id'); 
	order.action  	= $("#time_"+key+" a").attr('data-action'); 
	order.type   	= $("#time_"+key+" a").attr('data-type'); 
	order.status_keyword   = status_keyword; 	

	Ajax.call('user.php?act=wholesale_order_to_query', 'order=' + $.toJSON(order), orderResponse, 'POST', 'JSON');
});

$(document).on("click","*[ectype='userWhoConfirm']",function(){
	var orderid = $(this).data("orderid");
	pbDialog("是否把此订单设为已完成","",0,"","","",true,function(){
		location.href="user.php?act=wholesale_affirm_received&order_id="+ orderid;
	});
});
</script>
<?php endif; ?>


<?php if ($this->_var['action'] == 'account_raply'): ?>
<script type="text/javascript">
	$(function(){
		$("input[name='mobile_code']").keyup(function(){
			var m = $(this).val();
			
			Ajax.call( 'user.php?act=code_notice', 'code=' + m ,function(result){
				console.log(result);
				if(result == 1){
					$("#phone_code_callback").val(1);
				}else if(result == 2){
					$("#phone_code_callback").val(2);
				}else{
					$("#phone_code_callback").val(0);
				}
			} , 'GET', 'TEXT', true, true );
		});

		$("#submitBtn").click(function(){
			if($("#formSurplus").valid()){
				$("#formSurplus").submit();
			}
		});
		
		$('#formSurplus').validate({
			errorPlacement:function(error, element){
				var error_div = element.parents('div.value').find('div.form_prompt');
				//element.parents('div.label_value').find(".notic").hide();
				error_div.append(error);
			},
			rules : {
				amount : {
					required : true,
					number:true
				},
				mobile_code:{
					required : true,
					isphoneCode: "#phone_code_callback"
				}
			},
			messages : {
				amount : {
					required : "提现金额不能为空",
					number:"必须输入合法的数字"
				},
				mobile_code : {
					required : "手机验证码不能为空"
				}
			}
		});
	});
</script>
<?php endif; ?>

<?php if ($this->_var['action'] == 'wholesale_purchase'): ?>
<script type="text/javascript">
$(".t-images").slide({"mainCell":".t-images-info ul",effect:"left",trigger:"click",pnLoop:false,autoPage:true,vis:2,scroll:1});

var opts1 = {
        'targetId':'start_date',//时间写入对象的id
        'triggerId':['start_date'],//触发事件的对象id
        'alignId':'text_time1',//日历对齐对象
        'format':'-',//时间格式 默认'YYYY-MM-DD HH:MM:SS'
        'min':'' //最小时间
},opts2 = {
        'targetId':'end_date',
        'triggerId':['end_date'],
        'alignId':'text_time2',
        'format':'-',
        'min':''
}
xvDate(opts1);
xvDate(opts2);
<?php endif; ?>
</script>

<?php if ($this->_var['action'] == 'want_buy'): ?>
<script type="text/javascript">
	$(".t-images").slide({"mainCell":".t-images-info ul",effect:"left",trigger:"click",pnLoop:false,autoPage:true,vis:2,scroll:1});
	
	var opts1 = {
		'targetId':'wantbut_start_date',//时间写入对象的id
		'triggerId':['wantbut_start_date'],//触发事件的对象id
		'alignId':'text_time1',//日历对齐对象
		'format':'-',//时间格式 默认'YYYY-MM-DD HH:MM:SS'
		'min':'' //最小时间
	},opts2 = {
		'targetId':'wantbut_end_date',
		'triggerId':['wantbut_end_date'],
		'alignId':'text_time2',
		'format':'-',
		'min':''
	}
	xvDate(opts1);
	xvDate(opts2);
</script>
<?php endif; ?>

<?php if ($this->_var['action'] == 'profile'): ?>
<script type="text/javascript">
	<?php if ($this->_var['profile']['user_picture']): ?>
	var user_img='<?php echo $this->_var['profile']['user_picture']; ?>?&'+Math.random();
	<?php else: ?>
	var user_img="themes/<?php echo $GLOBALS['_CFG']['template']; ?>/images/touxiang.jpg";
	<?php endif; ?>
	
	$("*[ectype='up-pre-before']").find("img").attr('src',user_img)
	$("*[ectype='upImgTouch'] img").attr('src',user_img);
	
	
	//提交修改个人信息表单
	$("a[ectype='submit']").on("click",function(){
		$("form[name='formEdit']").submit();
	});
	
	//上传头像
	$(function(){
		//初始化
		var $image = $("*[ectype='image']"),//图片对象
			$inputImage = $("*[ectype='fileImage']"),//上传file按钮
			$modalDoc = $("*[ectype='docMdal']");//上传弹出层
			$modalLoad = $("*[ectype='modalLoad']"),//加载层
			$modalAlert = $("*[ectype='modalAlert']"),//提示层
			$alertContent = $modalAlert.find("*[ectype='alertContent']");//提示层内容
			
		var	URL = window.URL || window.webkitURL;
		var	blobURL;
			
		$image.cropper({
			aspectRatio:"1",
			autoCropArea:0.8,
			preview:".up-pre-after"
		});
		
		//弹出上传图片栏
		$("*[ectype='upImgTouch']").click(function(){
			$modalDoc.modal({width:'600px'});
		});
		
		//上传图片
		if(URL){
			$inputImage.change(function(){
				var files = this.files;
				var file;

				if(files && files.length){
				   file = files[0];

				   if(/^image\/\w+$/.test(file.type)){
						blobURL = URL.createObjectURL(file);
						$image.one('built.cropper',function(){
						   URL.revokeObjectURL(blobURL);
						}).cropper('reset').cropper('replace', blobURL);
						//$inputImage.val('');
					}else{
						window.alert('请选择图片文件！');
					}
				}
				
				// Amazi UI 上传文件显示代码
				var fileNames = '';
				$.each(this.files,function(){
					fileNames += '<span class="am-badge">' + this.name + '</span>';
				});
			
				$('#file-list').html(fileNames);
			});
		}else{
			$inputImage.prop('disabled', true).parent().addClass('disabled');
		}
		
		//绑定上传事件
		$("*[ectype='upBtnOk']").on('click',function(){
			var img_src = $image.attr("src");
			var url = $(this).attr("url");
			var canvas = $image.cropper('getCroppedCanvas');
			var data = canvas.toDataURL(); //转成base64

			//判断上传图片是否为空
			if(img_src == ""){
				//提示层赋值后，弹出提示
				$alertContent.html("<div class='error'>没有选择上传的图片</div>");
				$modalAlert.modal();
				return false;
			}
			
			$.ajax({  
				url:url,  
				dataType:"json",  
				type: "POST",
				data: {"image":data.toString()},  
				success: function(data,textStatus){
					//提示层赋值后，弹出提示
					$alertContent.html("<div class='success'>" + data.result + "</div>");
					$modalAlert.modal();
					
					if(data.error == "ok"){
						$("*[ectype='upImgTouch'] img").attr("src",data.file+'?&'+Math.random());
						
						var img_name = data.file.split('/')[2];
					}
				},
				error: function(){
					//提示层赋值后，弹出提示
					$alertContent.html("<div class='error'>上传文件失败了！</div>");
					$modalAlert.modal();
				}  
			});
		});
		
		//图片旋转
		$("*[ectype='rotate']").on("click",function(){
			var type = $(this).data("type")
				val = 0;
			
			if(type == "left"){
				val = -90;
			}else{
				val = 90
			}
			
			if($image.attr("src") != ""){
				$image.cropper('rotate', val);
			}else{
				//提示层赋值后，弹出提示
				$alertContent.html("<div class='error'>请先上传图片！</div>");
				$modalAlert.modal();
			}
		});
	});
</script>
<?php endif; ?>

<?php if ($this->_var['action'] == 'return_list'): ?>
<script type="text/javascript">
	//删除已完成退换货订单 start
	function get_order_delete_return(order_id){
		var order = new Object();
		order.order_id   = order_id;
		var firm = json_languages.operation_order_one;
		if(confirm(firm)){
			Ajax.call('user.php?act=order_delete_return', 'order=' + $.toJSON(order),function(result){
				if(result.error == 0){
					$("#return_list").html(result.content);
					$(".red").text(result.pager.record_count);
				}
			}, 'POST', 'JSON');
		}  
	}
</script>
<?php endif; ?>

<?php if ($this->_var['action'] == 'apply_return'): ?>
<?php if ($this->_var['goods_return']['rec_id']): ?>
<script type="text/javascript">
//退换货上传图片，支持多图片选择上传
var uploader_gallery = new plupload.Uploader({//创建实例的构造方法
	runtimes: 'html5,flash,silverlight,html4', //上传插件初始化选用那种方式的优先级顺序
	browse_button: 'uploadbutton', // 上传按钮
	url: "return_images.php?act=ajax_return_images&rec_id=<?php echo $this->_var['goods_return']['rec_id']; ?>&userId=<?php echo $this->_var['user_id']; ?>&sessid=<?php echo $this->_var['sessid']; ?>", //远程上传地址
	filters: {
		max_file_size: '2mb', //最大上传文件大小（格式100b, 10kb, 10mb, 1gb）
		mime_types: [//允许文件上传类型
			{title: "files", extensions: "bmp,gif,jpg,png,jpeg"}
		]
	},
	multi_selection: true, //true:ctrl多文件上传, false 单文件上传
	init: {
	   FilesAdded: function(up, files) { //文件上传前
			var len = $(".img-list-li li").length;
			plupload.each(files, function(file){ //遍历文件
				len ++;
			});
			if(len > 10){
				pbDialog("最多只能上传10张图片","",0);
			}else{
				//开始上传单张循环上传
				submitBtn();
			}
		},
		FileUploaded: function(up, file, info) { //文件上传成功的时候触发
			var data = eval("(" + info.response + ")");
			if(data.error == 2){
				pbDialog("登陆失效，请重新登陆","",0);
				return;
			}else{
				$(".mslist").html(data.content);
				$(".return_images").show();
				mscoll();
			}
		},
		UploadComplete:function(up,file){//所有文件上传成功时触发
				
		},
		Error: function(up, err) { //上传出错的时候触发
			pbDialog(err.message,"",0);
		}
	}
});
uploader_gallery.init();

$(function(){
	$("input[name='return_type']").on("click",function(){
		var val = $(this).val(),
			list = $("*[ectype='return_lists']"),
			div = list.find("*[ectype='return_div']");			
		
		div.eq(val).show().siblings().hide();
		
		if(val == 0){
			$("*[ectype='return-type']").show();
		}else if(val == 1){
			$("*[ectype='return-type']").hide();
		}else if(val == 2){
			$("*[ectype='return-type']").show();
			get_spec();
		}else{
			$("*[ectype='return-type']").hide();
			div.hide();
		}
		
		//默认退换货数量为1
		$("input[name='maintain_number'],input[name='attr_num'],input[name='return_num']").val(1);
	});
	
	
	//清空上传的图片
	var rec_id = $("input[name='return_rec_id']").val();
	
	$('.clear_pictures').click(function(){
		Ajax.call('return_images.php?act=clear_pictures', '&rec_id=' + rec_id,function(res){
			$('.mslist').html(res.content);
			$('.return_images').hide();
		}, 'POST', 'JSON');
	});
});

function submitBtn(){
	uploader_gallery.setOption("multipart_params");//设置传参
	uploader_gallery.start();//开始控件
};

/**选择退换货原因*/
function selectCause(val, rec_id) {
	if (val > 0) {
		Ajax.call('user.php?act=ajax_select_cause', 'c_id=' + val + '&rec_id=' + rec_id,function(res){
			rec_id = res.rec_id;
			$('#children_' + rec_id).html(res.option);
		}, 'POST', 'JSON');
	}
	else {
		$('#children_' + rec_id).html("");
	}
}

/**维修退货数量控制 **/
function check_return_num(obj, num, rec_id, type) {
	if ($(obj).val() > num) {
		$(obj).val(num);
	}
	if ($(obj).val() <= 0) {
		$(obj).val(1);
	}
	var val = $(obj).val();
	
	if(type == 1){
		$('#maintain_span_' + rec_id).html(val);
	}else if(type == 2){
		$('#retired_' + rec_id).html(val);
	}
}

/**换货数量控制 **/
function check_attr_num(obj, num, rec_id) {
	var val = $(obj).val();
	if (val > num) {
		val = num;
		$(obj).val(num);
	}
	if (val <= 0) {
		val = 1;
		$(obj).val(1);
	}
	
	$('#retired1_' + rec_id).html(val);
}

/**换货获得商品属性*/
function get_spec() {
	var rec_id = $("input[name='return_rec_id']").val();    
	var g_id = $("input[name='return_g_id']").val();    
	var g_number = $("input[name='return_g_number']").val();    
	
	Ajax.call('ajax_dialog.php?act=ajax_get_spec', 'rec_id=' + rec_id + '&g_id=' + g_id + '&g_number=' + g_number, get_pro_response, 'POST', 'JSON');
}

/**获得属性列表回调函数*/
function get_pro_response(res) {
	var spec = $("#spec_" + res.rec_id);
	
	spec.html("");
	spec.append(res.spec).show();
	
	if(res.attr_val != ''){
		var arr = new Array();
		var attr_arr = new Array();
		arr = res.attr_val.split(',');
		for(var i=0; i<arr.length; i++){
			attr_arr = arr[i].split('_');
			$("#attr_" + attr_arr[0]).val(attr_arr[1]);
		}
	}
}

/**选择商品属性*/
function setChange(id, t, attr_id) {
	$(t).addClass("cattsel").siblings().removeClass("cattsel");
	
	$('#attr_' + attr_id).val(id);
}

/**退换货数量变化*/
var buyNumber = {
	maxNumber : 100,
	minNumber : 1,
	rec_id : $("input[name='rec_id']").val(),

	defaultNumber : function(inputName){
		var defaultnumber = $("input[name='" +inputName+ "']").attr('defaultnumber');
		defaultnumber = parseInt(defaultnumber)
		if(defaultnumber < 1){
			defaultnumber = 1;
		}
		return defaultnumber;
	},
																							
	goodNumber : function(type, inputName, lastSpan, num){
		if(typeof(num) == 'number' && type == 2){
			lastSpan.html(num);
			return $("input[name='" +inputName+ "']").val(num);
		}else{
			return parseInt($("input[name='" +inputName+ "']").val());
		}
	},
	plus : function(obj, obj_type){
		var input_name = $(obj).parent().find('input').attr('name');

		if(obj_type == 1){
			var lastSpan = $(obj).parent().find('span').last();
		}else if(obj_type == 2){
			var lastSpan = $('#retired1_' + buyNumber.rec_id);
		}

		var num = buyNumber.goodNumber(1, input_name) + buyNumber.defaultNumber(input_name);
		var return_number = $("input[name='return_g_number']").val();

		if(num > return_number){
			pbDialog(json_languages.change_two +return_number+ json_languages.jian,"",0);
			num = return_number;
		}

		if(num <= buyNumber.maxNumber){
			buyNumber.goodNumber(2, input_name, lastSpan, num);
		}
	},
	minus : function(obj, obj_type){
		var input_name = $(obj).parent().find('input').attr('name');

		if(obj_type == 1){
			var lastSpan = $(obj).parent().find('span').last();
		}else if(obj_type == 2){
			var lastSpan = $('#retired1_' + buyNumber.rec_id);
		}

		var num = buyNumber.goodNumber(1, input_name) - buyNumber.defaultNumber(input_name);

		if(num >= buyNumber.minNumber){
			buyNumber.goodNumber(2, input_name, lastSpan, num);
		}
	}                                                                                                        
}

/**大于5张图片 左右显示滚动切换*/
function mscoll(){
	$(".mscoll").slide({mainCell:".mslist ul",effect:"left",pnLoop:false,autoPlay:false,autoPage:true,scroll:1,vis:5});
}
mscoll();

/**提交验证表单*/
function check_sub() {
	var frm = $('#formReturn');
	var rec_id = $("input[name='return_rec_id']").val();    
	
	if($("#cause_" + rec_id).val() == 0){
		pbDialog(json_languages.return_one,"",0);
		return false;
	}else{
		if($("#last_option_" + rec_id).val() == 0){
			pbDialog(json_languages.return_two,"",0);
			return false;
		}
	}
	
	if($(".text_desc").val() == ''){
		pbDialog(json_languages.return_three,"",0);
		return false;
	}
	
	var selCountries = $('#selCountries_0').val();
	var selProvinces = $('#selProvinces_0').val();
	var selCities = $('#selCities_0').val();
	
	if(selCountries == 0){
		pbDialog(json_languages.return_four,"",0);
		return false;
	}else if(selProvinces == 0){
		pbDialog(json_languages.selProvinces,"",0);
		return false;
	}else if(selCities == 0){
		pbDialog(json_languages.selCities,"",0);
		return false;
	}else{
		var selDistricts = $('#selDistricts_0');
		if(selDistricts.attr('style') != 'display:none'){
			if(selDistricts.val() == 0){
				pbDialog(json_languages.selDistricts,"",0);
				return false;
			}
		}
	}
	
	if($("input[name='return_address']").val() == ''){
		pbDialog(json_languages.address_empty,"",0);
		return false;
	}
	
	if($("input[name='addressee']").val() == ''){
		pbDialog(json_languages.Contact_name_empty,"",0);
		return false;
	}
	
	if($("input[name='mobile']").val() != ''){
		if($("input[name='mobile']").val().length != 11){
			pbDialog(json_languages.phone_format_error,"",0);
			return false;
		}
	}else{
		pbDialog(json_languages.msg_phone_blank,"",0);
		return false;
	}
	
	frm.action = frm.action + '?act=submit_return';
	frm.submit();
	return true;
}

$.levelLink();
</script>
<?php endif; ?>
<?php endif; ?>

<?php if ($this->_var['action'] == 'track_packages'): ?>
<?php if ($this->_var['orders']): ?>                  
<script language="javascript">
	$(".user-trackpack .item").each(function(){
		var id = $(this).data('orderid');
		var expressid = $("#shipping_name_"+id).html();
		var expressno = $("#invoice_no_"+id).html();

		//$("#retData_"+id).html("<center>"+logistics_tracking_in+"</center>");
		$.ajax({
			url: "plugins/kuaidi/express.php",
			type: "post",
			data:'com=' + expressid + '&nu=' + expressno,
			success: function(data,textStatus){
				$("#retData_"+id).html(data);
			},
			 error: function(o){
			}
		});
	});
</script>
<?php endif; ?>
<?php endif; ?>


<?php if ($this->_var['action'] == 'application_grade'): ?>     
<script language="JavaScript">
   $("a[ectype='submit']").on("click",function(){
		var frm  = $("form[name='grade_theForm']");
		var count_charge = frm.find("input[name='all_count_charge']").val();
		var msg = '';
		<?php $_from = $this->_var['entry_criteriat_info']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'info');if (count($_from)):
    foreach ($_from AS $this->_var['info']):
?>
			<?php if ($this->_var['info']['child']): ?>
				<?php $_from = $this->_var['info']['child']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'child');if (count($_from)):
    foreach ($_from AS $this->_var['child']):
?>
					<?php if ($this->_var['child']['is_mandatory'] == 1 && $this->_var['child']['type'] != 'charge'): ?>
						var name="value[<?php echo $this->_var['child']['id']; ?>]";
						var prompt  = "<?php echo $this->_var['child']['criteria_name']; ?>"+json_languages.cannot_null
						var a  = frm.find("input[name='"+name+"']").val();
						var error = frm.find("input[name='"+name+"']").nextAll('.notic');
						if(a.length == 0){
						   error.html(prompt);
						   msg += prompt + '\n';
						}
					<?php endif; ?>
				<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
			<?php endif; ?>
		<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>

		if(count_charge > 0){
			var prompt = '<div class="notic">' + json_languages.select_payment_pls + '</div>';
			 var pay_id  = frm.find("input[name='pay_id']").val();
			 if(pay_id.length == 0){
				 $(".pay_id_erro").append(prompt);
				  msg += prompt + '\n';
			 }
		}
		if (msg.length > 0){
			return false;
		}else{
			frm.submit();
		}
	});
	
	window.onload = function()
	{
		add_charge();
	}

	/*年限操作发生事件*/
	function add_charge(i){
		var re = /^[1-9]+[0-9]*]*$/; //大于0整数数字
		var all_count_charge = document.forms['grade_theForm'].elements['all_count_charge'];
		var price_one = document.forms['grade_theForm'].elements['count_charge'].value;
		var num = document.forms['grade_theForm'].elements['fee_num'];
		var count = document.getElementById('count_charge');
        var no_cumulative_price = document.forms['grade_theForm'].elements['no_cumulative_price'].value;
		if(i == 'reduce'){
			if(num.value == 1){
				pbDialog(json_languages.settled_down_lt1,"",0);
			}else{          
				if(num.value > 1){
					price_one = Number(price_one) - Number(no_cumulative_price);
				}
				num.value = parseInt(num.value)-1;
				all_count_charge.value = count.innerHTML = Number(count.innerHTML) - Number(price_one);
			}
		}else if(i == 'reset'){
			 all_count_charge.value = count.innerHTML = Number(price_one);
		}else if(i == 'add'){
			num.value = parseInt(num.value)+1;
			if(num.value > 1){
				price_one = Number(price_one) - Number(no_cumulative_price);
			}
			all_count_charge.value  = count.innerHTML = Number(count.innerHTML) + Number(price_one);
		}else if(i == 'keyup'){
			if(!re.test(num.value)){
				pbDialog(json_languages.Wrongful_input,"",0);
			}else{
				price_one = Number(price_one) - Number(no_cumulative_price);
				all_count_charge.value =  count.innerHTML = parseInt(num.value) * Number(price_one) + Number(no_cumulative_price);
			}
		}else{
			price_one = Number(price_one) - Number(no_cumulative_price);
            all_count_charge.value =  count.innerHTML = parseInt(num.value) * Number(price_one) + Number(no_cumulative_price);
		}
	}
</script>
<?php endif; ?>


<?php if ($this->_var['action'] == 'value_card'): ?>
<script type="text/javascript">
$("*[ectype='submitVC']").on("click",function(){
	
	new_addVC();
	
});
function new_addVC(){
	var vc = new Object;
	var message;
	
	vc.value_card_sn = $(".txt_input_cardnum").val();
	vc.password = $(".txt_input_cardpw").val();
	vc.captcha = $(":input[name='captcha']").val();
	
	if(vc.value_card_sn == ''){
		message = json_languages.card_number_null;
	}else if(vc.password == ''){
		message = json_languages.Real_name_password_null;
	}else if(vc.captcha == ''){
		message = json_languages.null_captcha_login;
	}
	
	if(vc.value_card_sn != '' && vc.password != '' && vc.captcha != ''){
		Ajax.call('user.php', 'act=add_value_card&vc=' + $.toJSON(vc), function(data){
			if(data.error == 2){
				var back_url = "user.php?act=value_card";
				$.notLogin("get_ajax_content.php?act=get_login_dialog",back_url);
			}else if(data.error == 3){
				pbDialog(data.message,"",0);
			}else if(data.error == 0){
				pbDialog(data.message,"",1,"","","",true,function(){
					 location.href = "user.php?act=value_card";
				});
			}else{
				pbDialog(data.message,"",0,"","",70);
			}
		}, 'POST', 'JSON');
	}else{
		pbDialog(message,"",0);
	}
}

function to_pay(vid){
	Ajax.call("get_ajax_content.php?act=to_pay_card&vid="+vid, '', function(data){
		pb({
			id:"storeDialogBody",
			title:"<?php echo $this->_var['lang']['value_card_filling']; ?>",
			width:450,
			height:250,
			content:data.content, 	//调取内容
			drag:false,
			foot:false
		});
	}, 'POST','JSON');

}
function remove_bind(vid){
	Ajax.call("get_ajax_content.php?act=remove_bind&vid="+vid, '', function(data){
		pb({
			id:"storeDialogBody",
			title:"<?php echo $this->_var['lang']['value_card_unwrap']; ?>",
			width:450,
			height:250,
			content:data.content, 	//调取内容
			drag:false,
			foot:false
		});
	}, 'POST','JSON');

}
</script>
<?php endif; ?>



<?php if ($this->_var['action'] == 'to_paid'): ?>    
<script type="text/javascript">
$("*[ectype='submitVC']").on("click",function(){
	new_addPC();
});
function new_addPC(){
	var pc = new Object;
	var message;
	
	pc.pay_card_sn = $(".txt_input_cardnum2").val();
	pc.vid = <?php echo $this->_var['vid']; ?>;
	pc.password = $(".txt_input_cardpw2").val();
	pc.captcha = $(".captcha_error2").val();
	
	if(pc.pay_card_sn == ''){
		message = '卡号不能为空';
	}else if(pc.password == ''){
		message = '密码不能为空';
	}else if(pc.captcha == ''){
		message = '验证码不能为空';
	}
	
	if(pc.pay_card_sn != '' && pc.password != '' && pc.captcha != ''){
		Ajax.call('user.php', 'act=use_pay_card&pc=' + $.toJSON(pc), function(data){
			if(data.error == 2){
				pbDialog(data.message,"",0,"","","",true,function(){
					location.href = "user.php";
				});
			}else if(data.error == 3){
				pbDialog(data.message,"",0);
			}else if(data.error == 0){
				pbDialog(data.message,"",1,"","","",true,function(){
					 location.href = "user.php?act=value_card";
				});
			}else{
				pbDialog(data.message,"",0,"","",70);
			}
		}, 'POST', 'JSON');
	}else{
		pbDialog(message,"",0);
	}
}
</script>
<?php endif; ?>



<?php if ($this->_var['action'] == 'crowdfunding'): ?>
<script type="text/javascript">
$(function(){
    $(document).on("click","*[data-dialog='zc_focus_dialog']",function(){
        var divId = $(this).data('divid');
        var url = $(this).data('url');
        var result = cancel_zc;
        var content = '<div class="tip-box icon-box">' +'<span class="warn-icon m-icon"></span>' + '<div class="item-fore">' +'<h3 class="rem ftx-04">'+result+'</h3>' +'</div>' +'</div>';
        pb({
            id:divId,
            title:json_languages.no_attention,
            width:455,
            height:58,
            ok_title:json_languages.determine, 	//按钮名称
            cl_title:json_languages.cancel, 	//按钮名称
            content:content, 	//调取内容
            drag:false,
            foot:true,
            onOk:function(){
                location.href = url;
            }
        });
        
        $('#' + divId + ' .tip-box .pb-ok').addClass('color_df3134');
    });
});
</script>
<?php endif; ?>


<?php if ($this->_var['action'] == 'account_bind'): ?>
<script type="text/javascript">
//购物车弹出框效果
$(document).on("click","*[data-dialog='oathdialog']",function(){
	
	var title = json_languages.Un_bind;
	var id = $(this).data('id');
	var username = $(this).data('username');
	var identity = $(this).data('identity');
	
	var title_h3 = json_languages.bind_user_one + title + identity + json_languages.account_bind_fuor + '？';
	var title_span = json_languages.account_bind_five+'<?php echo $this->_var['dwt_shop_name']; ?>'+ json_languages.account_bind_fuor + '：' + username + json_languages.registered +'.';
	
	pbDialog(title_h3,title_span,0,455,58,80,true,function(){
		Ajax.call('user.php?act=oath_remove', 'id=' + id + '&identity=' + identity, oath_removeResponse, 'POST','JSON');
	});
});

function oath_removeResponse(result){
	location.reload();
}
</script>
<?php endif; ?>
</body>
</html> 