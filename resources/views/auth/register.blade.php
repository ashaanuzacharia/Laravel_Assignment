@extends('layouts.app', ['class' => 'off-canvas-sidebar', 'activePage' => 'home', 'title' => __('Welcome')])

@section('content')
@include('toastr')
<header id="nino-header">
		<div id="nino-headerInner">					
			<nav id="nino-navbar" class="navbar navbar-default" role="navigation">
				<div class="container">

					<!-- Brand and toggle get grouped for better mobile display -->
					<div class="navbar-header">
						<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#nino-navbar-collapse">
							<span class="sr-only">Toggle navigation</span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</button>
						<a class="navbar-brand" href="homepage.html">Mogo</a>
					</div>

					<!-- Collect the nav links, forms, and other content for toggling -->
					<div class="nino-menuItem pull-right">
						<div class="collapse navbar-collapse pull-left" id="nino-navbar-collapse">
							<ul class="nav navbar-nav">
								<li class="active"><a href="#nino-header">Home <span class="sr-only">(current)</span></a></li>
								<li><a href="#nino-story">About</a></li>
								<li><a href="#nino-services">Service</a></li>
								<li><a href="#nino-ourTeam">Our Team</a></li>
								<li><a href="#nino-portfolio">Work</a></li>
								<li><a href="#nino-latestBlog">Blog</a></li>
							</ul>
						</div><!-- /.navbar-collapse -->
						<ul class="nino-iconsGroup nav navbar-nav">
							<li><a href="#"><i class="mdi mdi-cart-outline nino-icon"></i></a></li>
							<li><a href="#" class="nino-search"><i class="mdi mdi-magnify nino-icon"></i></a></li>
						</ul>
					</div>
				</div><!-- /.container-fluid -->
			</nav>
            <section id="nino-story">
                <div class="container justify-content-center">
                    <div class="row ">
                        <div class="col-md-8">
                            <div class="card">
                                <div class="card-header text-center pt-4">
                                <h2 class="nino-sectionHeading">{{ __('Signup for your Account.') }}</h2>
                                </div>
                                <div class="card-body">
                                    <form action="{{ route('user.register') }}" method="post">
                                    @csrf 
                                        
                                        
                                        <div class="form-group">
                                            <label class="text-primary" for="name"> Name <span class="text-danger"> * </span> </label>
                                            <input type="text" name="name" class="form-control" value="{{old('name')}}" />
                                            {!!$errors->first("name", "<span class='text-danger'>:message</span>")!!}
                                        </div>

                                        <div class="form-group">
                                            <label class="text-primary" for="email"> Email <span class="text-danger"> * </span> </label>
                                                <input type="email" name="email" class="form-control" value="{{old('email')}}" />
                                                {!!$errors->first("email", "<span class='text-danger'>:message</span>")!!}
                                        </div>

                                        <div class="form-group">
                                            <label class="text-primary" for="phone"> Phone <span class="text-danger"> * </span></label>
                                                <input type="text" max="10" name="phone" class="form-control" value="{{old('phone')}}" />
                                                {!!$errors->first("phone", "<span class='text-danger'>:message</span>")!!}
                                        </div>
                                        
                                        <div class="form-group">
                                            <label class="text-primary" for="company"> Company <span class="text-danger"> * </span></label>
                                                <input type="text" max="10" name="company" class="form-control" value="{{old('company')}}" />
                                                {!!$errors->first("company", "<span class='text-danger'>:message</span>")!!}
                                        </div>
                                        <div class="form-group">
                                            <label class="text-primary" for="designation"> Designation <span class="text-danger"> * </span></label>
                                                <input type="text"  name="designation" class="form-control" value="{{old('designation')}}" />
                                                {!!$errors->first("designation", "<span class='text-danger'>:message</span>")!!}
                                        </div>
                                        
                                        <div class="form-group">
                                                <label class="text-primary" for="password"> Password <span class="text-danger"> * </span></label>
                                                    <input type="password" name="password" class="form-control" value="{{old('password')}}" />
                                                    {!!$errors->first("password", "<span class='text-danger'>:message</span>")!!}
                                        </div>

                                        <div class="form-group">
                                            <label class="text-primary" for="confirm_password"> Confirm Password <span class="text-danger"> * </span></label>
                                                <input type="password" name="confirm_password" class="form-control" value="{{old('confirm_password')}}" />
                                                {!!$errors->first("confirm_password", "<span class='text-danger'>:message</span>")!!}
                                        </div>

                                        <div class="card-footer">
                                            <button type="submit" class="btn btn-success"> Register </button>
                                        </div>
                                    
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
			
		</div>
	</header><!--/#header-->
    <!-- Footer
    ================================================== -->
    <footer id="footer">
        <div class="container">
        	<div class="row">
        		<div class="col-md-4">
        			<div class="colInfo">
	        			<div class="footerLogo">
	        				<a href="#" >MoGo</a>	
	        			</div>
	        			<p>
	        				Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
	        			</p>
	        			<div class="nino-followUs">
	        				<div class="totalFollow"><span>15k</span> followers</div>
	        				<div class="socialNetwork">
	        					<span class="text">Follow Us: </span>
	        					<a href="" class="nino-icon"><i class="mdi mdi-facebook"></i></a>
	        					<a href="" class="nino-icon"><i class="mdi mdi-twitter"></i></a>
	        					<a href="" class="nino-icon"><i class="mdi mdi-instagram"></i></a>
	        					<a href="" class="nino-icon"><i class="mdi mdi-pinterest"></i></a>
	        					<a href="" class="nino-icon"><i class="mdi mdi-google-plus"></i></a>
	        					<a href="" class="nino-icon"><i class="mdi mdi-youtube-play"></i></a>
	        					<a href="" class="nino-icon"><i class="mdi mdi-dribbble"></i></a>
	        					<a href="" class="nino-icon"><i class="mdi mdi-tumblr"></i></a>
	        				</div>
	        			</div>
	        			<form action="" class="nino-subscribeForm">
	        				<div class="input-group input-group-lg">
								<input type="email" class="form-control" placeholder="Your Email" required>
								<span class="input-group-btn">
									<button class="btn btn-success" type="submit">Subscribe</button>
								</span>
							</div>
	        			</form>
        			</div>
        		</div>
        		<div class="col-md-4 col-sm-6">
        			<div class="colInfo">
	        			<h3 class="nino-colHeading">Blogs</h3>
	        			<ul class="listArticles">
	        				<li layout="row" class="verticalCenter">
	        					<a class="articleThumb fsr" href="#"><img src="../assets/images/our-blog/img-4.jpg" alt=""></a>
	        					<div class="info">
	        						<h3 class="articleTitle"><a href="#">Lorem ipsum dolor sit amet, consectetur adipiscing</a></h3>
	        						<div class="date">Jan 9, 2016</div>
	        					</div>
	        				</li>
	        				<li layout="row" class="verticalCenter">
	        					<a class="articleThumb fsr" href="#"><img src="../assets/images/our-blog/img-5.jpg" alt=""></a>
	        					<div class="info">
	        						<h3 class="articleTitle"><a href="#">Lorem ipsum dolor sit amet, consectetur adipiscing</a></h3>
	        						<div class="date">Jan 9, 2016</div>
	        					</div>
	        				</li>
	        				<li layout="row" class="verticalCenter">
	        					<a class="articleThumb fsr" href="#"><img src="../assets/images/our-blog/img-6.jpg" alt=""></a>
	        					<div class="info">
	        						<h3 class="articleTitle"><a href="#">Lorem ipsum dolor sit amet, consectetur adipiscing</a></h3>
	        						<div class="date">Jan 9, 2016</div>
	        					</div>
	        				</li>
	        			</ul>
        			</div>
        		</div>
        		<div class="col-md-4 col-sm-6">
        			<div class="colInfo">
	        			<h3 class="nino-colHeading">instagram</h3>
	        			<div class="instagramImages clearfix">
	        				<a href="#"><img src="../assets/images/instagram/img-1.jpg" alt=""></a>
	        				<a href="#"><img src="../assets/images/instagram/img-2.jpg" alt=""></a>
	        				<a href="#"><img src="../assets/images/instagram/img-3.jpg" alt=""></a>
	        				<a href="#"><img src="../assets/images/instagram/img-4.jpg" alt=""></a>
	        				<a href="#"><img src="../assets/images/instagram/img-5.jpg" alt=""></a>
	        				<a href="#"><img src="../assets/images/instagram/img-6.jpg" alt=""></a>
	        				<a href="#"><img src="../assets/images/instagram/img-7.jpg" alt=""></a>
	        				<a href="#"><img src="../assets/images/instagram/img-8.jpg" alt=""></a>
	        				<a href="#"><img src="../assets/images/instagram/img-9.jpg" alt=""></a>
	        				<a href="#"><img src="../assets/images/instagram/img-3.jpg" alt=""></a>
	        				<a href="#"><img src="../assets/images/instagram/img-4.jpg" alt=""></a>
	        				<a href="#"><img src="../assets/images/instagram/img-5.jpg" alt=""></a>
	        			</div>
	        			<a href="#" class="morePhoto">View more photos</a>
        			</div>
        		</div>
        	</div>
			<div class="nino-copyright">Copyright &copy; 2016 <a target="_blank" href="http://www.ninodezign.com/" title="Ninodezign.com - Top quality open source resources for web developer and web designer">Ninodezign.com</a>. All Rights Reserved. <br/> MoGo free PSD template by <a href="https://www.behance.net/laaqiq">Laaqiq</a></div>
        </div>
    </footer><!--/#footer-->

@endsection
