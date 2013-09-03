<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>大学城二手书网 - <?php echo $title;?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Le styles -->
    <link href="<?php echo base_url('public/css/bootstrap.css');?>" rel="stylesheet">
    <link href="<?php echo base_url('public/css/style.css');?>" rel="stylesheet">

    <link href="<?php echo base_url('public/css/bootstrap-responsive.css');?>" rel="stylesheet">

    <!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

    <!-- Le fav and touch icons -->
    <link rel="shortcut icon" href="ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="ico/apple-touch-icon-57-precomposed.png">   
    <script src="<?php echo base_url('public/js/jquery.js');?>"></script>    
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8"></head>

  <body>
    <!--top nav bar-->
    <div class="navbar navbar-fixed-top navbar-inverse">
      <div class="navbar-inner">
        <div class="row-fluid">
          <div class="offset1">
            <a class="brand" href="<?php echo base_url();?>">大学城二手书网</a>
            <ul class="nav">
			<?php
				$attributes = array('class' => 'navbar-form pull-left','id' => 'search_form'); 
				echo form_open('book/search', $attributes);
			?>              
                    <input id="word" name="word" type="text" class="input-xlarge" placeholder="搜索二手书..."></input>
                    <a id="submit_search" type="submit" class="btn btn-info">搜书</a>
                    <a type="submit" href="<?php echo base_url('book/release');?>" class="btn btn-primary">我要卖书</a>          
              </form>
            </ul>
            <ul class="nav">
              <li class="divider-vertical"></li>
              	<li><a href="<?php echo base_url('book/lists/1');?>">待售</a></li>
                <li><a href="<?php echo base_url('book/lists/2');?>">求购</a></li>
                <li><a href="<?php echo base_url('book/lists/3');?>">换书</a></li>
                <li><a href="<?php echo base_url('book/lists/4');?>">捐书</a></li>
              <li class="dropdown">
                <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                图书分类
                <b class="caret"></b>
                </a>
                <ul class="dropdown-menu">
                  <li><a>按学科分类</a></li>
                  <li><a>按学校分类</a></li>
                </ul>
              </li>
              
            </ul>
          </div>
          <div class="span2">
            <ul class="nav nav-pills pull-right">  
				<?php echo change_user_state();?>
            </ul><!--/.nav-collapse -->
            <div id="login" class="modal hide fade in" >
              <div class="modal-header">
                <a class="close" data-dismiss="modal">×</a>
                <h3>登陆</h3>
              </div>
              <div class="modal-body">
				<?php
                    $attributes = array('class' => 'form-horizontal', 'id' => 'login_form'); 
                    echo form_open('user/login', $attributes);
                ?> 
                <fieldset>
                  <div class="control-group">
                    <label class="control-label" for="username">用户名</label>
                    <div class="controls">
                      <input type="text" name="username" id="username" value="<?php echo set_value('username'); ?>" />             
                    </div>
                  </div>
                  <div class="control-group">
                    <label class="control-label" for="password">密码</label>
                    <div class="controls">
                      <input type="password" name="password" id="password" />             
                    </div>
                  </div>       
                    <div class="control-group">
                      <div class="controls">
                      <label class="checkbox">
                      <input type="checkbox">记住我？
                      </label>
                      </div>
                    <div class="control-group">
                      <div class="controls">
                        <a href="#"><i class="icon-sina"></i>微博登录</a>
                        <a href="#"><i class="icon-qq"></i>QQ登录</a>          
                      </div>
                    </div>                  
                </fieldset>                                                
                </form>
              </div>
              <div class="modal-footer">
                  <a id="submit_login" href="#" class="btn btn-primary">登陆</a>
                  <a href="<?php echo base_url('user/register');?>">注册</a>
              </div>
            </div>    
          </div>
        </div>
      </div>
    </div>
    <!-- end top nav bar -->  
    <?php if(get_action() != 'index'){?>
      <hr />

    <div class="container">
    <?php }?>
      
