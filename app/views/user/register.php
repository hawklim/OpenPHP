    <div class="page-header">

    </div>
      <div  class="row-fluid" >
        <div class="span3 offset3">
			<?php
				$attributes = array('class' => 'form-horizontal'); 
				echo form_open('user/register', $attributes);
			?>           
            <div class="control-group">
              <label class="control-label" for="username">用户名</label>
              <div class="controls">
              <input name="username" type="text" value="<?php echo set_value('username'); ?>" id="username" placeholder="Username">
              </div>
            </div>
            <div class="control-group">
              <label class="control-label" for="password">密码</label>
              <div class="controls">
              <input name="password" type="password" id="password" placeholder="Password">
              </div>
            </div>
            <div class="control-group">
              <label class="control-label" for="passwordf">密码确认</label>
              <div class="controls">
              <input name="passconf" type="password" id="passwordf" placeholder="Password Confirmation">
              </div>
            </div>
            <div class="control-group">
              <label class="control-label" for="mail">Email</label>
              <div class="controls">
              <input name="mail" type="text" value="<?php echo set_value('mail'); ?>" id="mail" placeholder="Email">
              </div>
            </div>
            <div class="control-group">
              <label class="control-label" for="school">学校</label>
              <div class="controls">
                  <select name="schoolid">   
                     <?php
                         foreach($school as $s_item): 
                            echo "<option value='".$s_item->sid."'>".$s_item->schoolname."</option> ";  
                         endforeach;              
                    ?>                                                           
                  </select>
              </div>
            </div>            
            
            <div class="control-group">
              <div class="controls">
             	 <input type="submit" class="btn btn-success" name="submit" value="注册" />
              </div>
            </div>
          </form>
        </div>
      </div>
      <hr>