      <hr> 
 <!-- footer -->
      <footer id="footer">
        <div class="span8 offset3">  
          <ul class="nav nav-pills">
            <li><a href="#">关于我们</a></li>
            <li><a href="#">意见反馈</a></li>
            <li><a href="#">版权说明</a></li>
            <li><a href="#">加入我们</a></li>
            <li><a href="#">帮助中心</a></li>
          </ul>
        </div>
      </footer>

      <!-- end footer --> 

    </div><!--/.fluid-container-->

    <!-- Le javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="<?php echo base_url('public/js/bootstrap-transition.js');?>"></script>
    <script src="<?php echo base_url('public/js/bootstrap-alert.js');?>"></script>
    <script src="<?php echo base_url('public/js/bootstrap-modal.js');?>"></script>
    <script src="<?php echo base_url('public/js/bootstrap-dropdown.js');?>"></script>
    <script src="<?php echo base_url('public/js/bootstrap-scrollspy.js');?>"></script>
    <script src="<?php echo base_url('public/js/bootstrap-tab.js');?>"></script>
    <script src="<?php echo base_url('public/js/bootstrap-tooltip.js');?>"></script>
    <script src="<?php echo base_url('public/js/bootstrap-popover.js');?>"></script>
    <script src="<?php echo base_url('public/js/bootstrap-button.js');?>"></script>
    <script src="<?php echo base_url('public/js/bootstrap-collapse.js');?>"></script>
    <script src="<?php echo base_url('public/js/bootstrap-carousel.js');?>"></script>
    <script src="<?php echo base_url('public/js/bootstrap-typeahead.js');?>"></script>
	<script type="text/javascript">
		function load_category(cid, level)
		{
			var levelUp = level+1;
			 $.getJSON("<?php echo base_url('cat/get_children');?>",{cid:cid}, function (data, textStatus){
				if(cid==0 || data.length==0)																		 														 				{
					$('#load_category_'+level).html("");	
				} else {
					var option = "<option value='0'>选择分类</option>";
					$.each(data,function(i,n){
						option = option+"<option value='"+n['cid']+"'>"+n['catname']+"</option>";					 
					});
					$('#load_category_'+level).html("<select onChange='load_category(this.value, "+levelUp+");'>"+option+"</select><span id='load_category_"+levelUp+"'></span>");
				}
				$('input[name=catid]').val(cid);
			 });
			 
		 }
        $(document).ready(function(){
            $('#header_nav li').removeClass('active');								   
            $('#header_nav a:contains("<?php echo $title;?>")').parent().addClass('active');   
			
            $('#manage_nav li').removeClass('active');								   
            $('#manage_nav a:contains("<?php echo $title;?>")').parent().addClass('active');   
			
			$('#submit_login').click(function(){										  
				$('#login_form').submit();
			});
			
			$('#submit_search').click(function(){
				var word = $('#word').val();
				if(word==''){
					alert('搜索内容不能为空');	
					return false;
				}												   
				$('#search_form').submit();								   
			});

        });
    </script>    
  </body>
</html>
