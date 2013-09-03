      <div class="row">
        <div class="span2">
          <ul id="manage_nav" class="nav nav-list center snowBG">
            <li class="nav-header bar">我的二手书</li>
            <li class="active"><a href="<?php echo base_url('book/manage/1/1');?>">当前待售</a></li>
            <li class=""><a href="<?php echo base_url('book/manage/2/1');?>">当前求购</a></li>
            <li class=""><a href="<?php echo base_url('book/manage/3/1');?>">当前换书</a></li>
            <li class=""><a href="<?php echo base_url('book/manage/');?>">已下架</a></li>
            <li class=""><a href="<?php echo base_url('user/edit');?>">个人信息</a></li>
          </ul>
        </div>
        <div class="span10">
          <header class="light-bar">
            <h5>个人信息</h5>
          </header>
			<?php echo form_open('user/edit'); ?>  
           <table id="userinfo" class="table  table-striped">
            <tr>
            	<td>用户名</td>
              <td><input class="disabled" name="username" type="text" value="<?=set_value('username', isset($user['username'])?$user['username']:'')?>" readonly/></td>
            </tr>
            <tr>
            	<td>昵称</td>
              <td><input type="text" name="nickname" value="<?=set_value('nickname', isset($user['nickname'])?$user['nickname']:'')?>" /></td>
            </tr>
            <tr>
            	<td>手机</td>
              <td><input type="text" name="tel" value="<?=set_value('tel', isset($user['tel'])?$user['tel']:'')?>" /></td>
            </tr>
            <tr>
            	<td>短号</td>
              <td><input type="text" name="shorttel" value="<?=set_value('shorttel', isset($user['shorttel'])?$user['shorttel']:'')?>" /></td>
            </tr>
            <tr>
            	<td>QQ</td>
              <td><input type="text" name="qq" value="<?=set_value('qq', isset($user['qq'])?$user['qq']:'')?>" /></td>
            </tr>
            <tr>
            	<td>学校</td>
              <td>
                  <select name="schoolid">   
                     <?php
                         foreach($school as $s_item):
                             if($s_item->sid == $user['schoolid']){ 
                                echo "<option selected value='".$s_item->sid."'>".$s_item->schoolname."</option> ";   
                             } else {
                                echo "<option value='".$s_item->sid."'>".$s_item->schoolname."</option> ";     
                             }   
                         endforeach;                
                    ?>                                                           
                  </select>
              </td>
            </tr>
          </table> 
            <div class="form-actions">
              <input type="submit" name="submit" class="btn btn-primary" value="保存修改" />                
              <button class="btn dropdown" data-toggle="modal" href="#resetpassword">修改密码</button>
            </div>
          </form>
        </div>
      </div>
