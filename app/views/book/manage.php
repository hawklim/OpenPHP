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
            <div id="orderBy" class="btn-group" data-toggle="buttons-radio">
              <a href="<?php echo base_url('book/manage/'.$sid.'/'.$is_posted.'/2');?>" class="btn">价格 <i class="icon-arrow-up"></i></a>
              <a href="<?php echo base_url('book/manage/'.$sid.'/'.$is_posted.'/1');?>" class="btn">发布时间 <i class="icon-arrow-up"></i></a>
              <a href="<?php echo base_url('book/manage/'.$sid.'/'.$is_posted.'/3');?>" class="btn">出版时间 <i class="icon-arrow-up"></i></a>              
            </div>            
          </header>
          <table class="table table-bordered table-striped">
            <tr>
            	<th>照片</th>
            	<th>书名</th>
            	<th>数量</th>
            	<th>新旧程度</th>
            	<th>发布时间</th>
            	<th>操作</th>
            </tr>
        	<?php foreach($book_data as $book): ?>                           
            <tr>
            	<td><img src="<?=img_url(base_url($book->thumb))?>" alt="" style="width:80px; height:80px" /></td>
            	<td><?=$book->title?></td>
            	<td><?=$book->amount?> 本</td>
            	<td><?=$book->condition?> 成新</td>
            	<td><?=timetodate($book->addtime)?></td>
            	<td class="btn-group"><a onclick="return confirm('确定要<?=post_name($book->is_posted)?>?');" href="<?php echo base_url('book/'.post_method($book->is_posted).'/'.$book->bid);?>"><button class="btn"><?=post_name($book->is_posted);?></button></a><a href="<?php echo base_url('book/edit/'.$book->bid);?>"><button class="btn">修改</button></a></td>
            </tr>
    		<?php endforeach; ?>            
          </table>
        </div>
      </div>