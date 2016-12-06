<?php 
    $logged_in = null !== $this->session->userdata();
?>
<div id="nav">
			<nav class="navbar navbar-default navbar-fixed-top shadow-1">
				<div class="container-fluid">
					<div class="navbar-header">
      					<a class="navbar-brand" href="<?php 
                  echo base_url();
                  if(false) {
                    echo 'PPWE_1/index.php/dashboard';
                  } else {
                    echo 'PPWE_1/index.php/login';
                  }
                ?>">PinjamBuku</a>
    				</div>
                    <?php 
    					if($logged_in) {
    						echo '<div class="navbar-nav navbar-right">
    							<a class="navbar-text dropdown-toggle" data-toggle="dropdown" href="#"><span class="glyphicon glyphicon-user"></span>'.$this->session->userdata('username').'<span class="caret"></span></a>
        						<ul class="dropdown-menu">
          						    <li><a href="#"><span class="glyphicon glyphicon-book"></span> Pinjaman</a></li>
          						    <li><a href="#"><span class="glyphicon glyphicon-log-out"></span> Log out</a></li>
        						</ul></div>';
    					} else {
    						echo '<form class="navbar-form navbar-right" action="index.php" method="post">
      							   <div class="form-group">
        						      <input type="text" class="form-control" name="username" placeholder="Username">
        						      <input type="password" class="form-control" name="password" placeholder="Password">
        						      <input type="hidden" name="command" value="login">
      							   </div>
      							   <button type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-log-in"></span> Log in</button>
    							</form>';
    					}
    				?> 
				</div>
			</nav>
		</div>