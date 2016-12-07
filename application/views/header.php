<style>
  .navbar-default{
    background-color: rgba(255,255,255,0.87);
  }
  * {
    color: #052B4F;
  }
</style>
<div id="nav">
			<nav class="navbar navbar-default navbar-fixed-top shadow-1">
				<div class="container-fluid">
					<div class="navbar-header">
      					<a class="navbar-brand" href="<?php echo base_url().'PPWE_1/index.php'; ?>">PinjamBuku</a>
    				</div>
              <?php
                $this->load->library('session');
                $isLoggedIn = $this->session->has_userdata('username');
                echo '<div class="navbar-nav navbar-right">';
    					  if($isLoggedIn) {
    					    $username = $this->session->userdata('username');
                  $role = $this->session->userdata('role');
    						echo '<div class="navbar-nav">
    							<a class="navbar-text dropdown-toggle" data-toggle="dropdown" href="#"><span class="glyphicon glyphicon-user"></span>  '.$this->session->userdata('username').'  <span class="caret"></span></a>
        						<ul class="dropdown-menu">';
                         if($role == 'user'){
          						    echo'<li><a href="'.base_url().'PPWE_1/index.php/dashboard/pinjaman"><span class="glyphicon glyphicon-book"></span> Pinjaman</a></li>';}
                          else if($role == 'admin'){
                                     echo ' <li><a href="'.base_url().'PPWE_1/index.php/dashboard/add_book"><span class="glyphicon glyphicon-plus"></span>Tambahkan buku</a></li>';
                                 }
                                echo '<li role="separator" class="divider"></li>';
                                echo '<li><a href="'.base_url().'PPWE_1/index.php/logout"><span class="glyphicon glyphicon-log-out"></span> Log out</a></li>
        						</ul></div>';
    					} else {
    						echo '<form class="navbar-form" action="' . base_url(). 'PPWE_1/index.php/login/login" method="post">
      							   <div class="form-group">
        						      <input type="text" class="form-control" name="username" placeholder="Username" required oninvalid="this.setCustomValidity(\'Username tidak boleh kosong\')"/>
        						      <input type="password" class="form-control" name="password" placeholder="Password"  placeholder="password" name="password" required oninvalid="this.setCustomValidity(\'Password tidak boleh kosong\')"/>
        						      <input type="hidden" name="command" value="login">
      							   </div>
      							   <button type="submit" class="btn btn-primary" value="Login"><span class="glyphicon glyphicon-log-in"></span> Log in</button>
    							</form>';
    					}
              echo '</div>'
    				?>
				</div>
			</nav>
		</div>