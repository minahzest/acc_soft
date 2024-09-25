<div class="site-overlay"></div>

  <div class="site-header">

    <nav class="navbar navbar-default navbar-colr">

      <div class="navbar-header">

        <a class="navbar-brand" href="<?=base_url()?>" style="padding: 1px 10px;">

          <img src="<?=base_url()?>assets/img/" alt="" height="45">

        </a>

        <button class="navbar-toggler left-sidebar-toggle pull-left visible-xs" type="button">

          <span class="hamburger"></span>

        </button>

        <!-- <button class="navbar-toggler right-sidebar-toggle pull-right visible-xs-block" type="button">

          <i class="zmdi zmdi-long-arrow-left"></i>

          <div class="dot bg-danger"></div>

        </button> -->

        <button class="navbar-toggler pull-right visible-xs-block" type="button" data-toggle="collapse" data-target="#navbar">

          <span class="more"></span>

        </button>

      </div>

      <div class="navbar-collapsible">

        <div id="navbar" class="navbar-collapse collapse bar-fnt-colr">

          <button class="navbar-toggler left-sidebar-collapse pull-left hidden-xs bar-fnt-colr" type="button">

            <span class="hamburger bar-fnt-colr"></span>

          </button>

          <!-- <button class="navbar-toggler right-sidebar-toggle pull-right hidden-xs" type="button">

            <i class="zmdi zmdi-long-arrow-left"></i>

            <div class="dot bg-danger"></div>

          </button> -->

          <ul class="nav navbar-nav">

            <li class="visible-xs-block">

              <div class="nav-avatar">

                <img class="img-circle" src="<?=base_url()?>assets/img/logo.jpeg" width="48" height="48">

              </div>

              <h4 class="navbar-text text-center">Welcome, DELHI MOTORS!</h4>

            </li>

          </ul>

          <div class="navbar-form navbar-left">

            <div class="navbar-search-group">

              <input type="text" class="form-control input-text-theme" id="srach" placeholder="Search">

              <button type="submit" class="btn btn-default" id="searchButton" onclick="search();">

                <i class="zmdi zmdi-search"></i>

              </button>

            </div>

          </div>

          <ul class="nav navbar-nav navbar-right">

            <li class="nav-table dropdown visible-xs-block">

              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">

                <span class="nav-cell nav-icon bar-fnt-colr">

                  <i class="zmdi zmdi-account-o"></i>

                </span>

                <span class="hidden-md-up m-l-15">Account</span>

              </a>

              <ul class="dropdown-menu bar-fnt-colr">

                <li>

                  <a href="<?=base_url('profile')?>">

                    <i class="zmdi zmdi-account-o m-r-10"></i> Profile</a>

                </li>

                <li role="separator" class="divider"></li>

                <li><a href="<?= base_url('logout')?>">Logout</a></li>

              </ul>

            </li>

            <!-- <li class="nav-table dropdown">

              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">

                <span class="nav-cell nav-icon">

                  <i class="zmdi zmdi-notifications-none"></i>

                </span>

                <span class="hidden-md-up m-l-15">Notifications</span>

                <span class="label label-warning">7</span>

              </a>

              <div class="dropdown-menu custom-dropdown dropdown-messages dropdown-menu-right">

                <div class="dropdown-header">

                  <span>Notifications</span>

                  <a href="#" class="text-primary">Mark all as read</a>

                </div>

                <div class="m-items">

                  <div class="custom-scrollbar">

                    <div class="m-item">

                      <a href="#">

                        <div class="mi-icon bg-warning">

                          <i class="zmdi zmdi-upload"></i>

                        </div>

                        <div class="mi-time">10 min</div>

                        <div class="mi-title">Upload status</div>

                        <div class="mi-text text-truncate">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</div>

                      </a>

                    </div>

                    <div class="m-item">

                      <a href="#">

                        <div class="mi-icon bg-success">

                          <i class="zmdi zmdi-money"></i>

                        </div>

                        <div class="mi-time">40 min</div>

                        <div class="mi-title">Income</div>

                        <div class="mi-text text-truncate">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</div>

                      </a>

                    </div>

                    <div class="m-item">

                      <a href="#">

                        <div class="mi-icon bg-primary">

                          <i class="zmdi zmdi-alert-triangle"></i>

                        </div>

                        <div class="mi-time">3 hours</div>

                        <div class="mi-title">New task</div>

                        <div class="mi-text text-truncate">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</div>

                      </a>

                    </div>

                    <div class="m-item">

                      <a href="#">

                        <div class="mi-icon bg-warning">

                          <i class="zmdi zmdi-upload"></i>

                        </div>

                        <div class="mi-time">10 min</div>

                        <div class="mi-title">Upload status</div>

                        <div class="mi-text text-truncate">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</div>

                      </a>

                    </div>

                    <div class="m-item">

                      <a href="#">

                        <div class="mi-icon bg-success">

                          <i class="zmdi zmdi-money"></i>

                        </div>

                        <div class="mi-time">40 min</div>

                        <div class="mi-title">Income</div>

                        <div class="mi-text text-truncate">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</div>

                      </a>

                    </div>

                    <div class="m-item">

                      <a href="#">

                        <div class="mi-icon bg-primary">

                          <i class="zmdi zmdi-alert-triangle"></i>

                        </div>

                        <div class="mi-time">3 hours</div>

                        <div class="mi-title">New task</div>

                        <div class="mi-text text-truncate">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</div>

                      </a>

                    </div>

                  </div>

                </div>

                <div class="dropdown-footer">

                  <a href="#">View all notifications</a>

                </div>

              </div>

            </li> -->

            <li class="nav-table dropdown hidden-sm-down">

              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">

                <span class="nav-cell p-r-10 bar-fnt-colr">

                  <img class="img-circle" src="<?=base_url()?>assets/img/logo.jpeg" alt="" width="32" height="32">

                </span>

                <span class="nav-cell bar-fnt-colr">DELHI MOTORS

                  <span class="caret bar-fnt-colr"></span>

                </span>

              </a>

              <ul class="dropdown-menu bar-fnt-colr">

                <li>

                    <a href="<?=base_url('profile')?>">

                      <i class="zmdi zmdi-account-o m-r-10"></i> Profile</a>

                  </li>

                  <li role="separator" class="divider"></li>

                  <li>

                    <a href="<?=base_url('logout')?>">

                      <i class="zmdi zmdi-power m-r-10"></i> Logout</a>

                  </li>

              </ul>

            </li>

          </ul>

        </div>

      </div>

    </nav>

  </div>