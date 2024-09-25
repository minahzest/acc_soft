<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>  
    <div class="site-left-sidebar">
        <div class="sidebar-backdrop"></div>
        <div class="custom-scrollbar">
          <ul class="sidebar-menu">
            <!--Main-->
            <li class="menu-title">Main</li>
            <li class="active">
              <a href="<?=base_url()?>" aria-haspopup="true">
                <span class="menu-icon bar-fnt-colr">
                  <i class="zmdi zmdi-home"></i>
                </span>
                <span class="menu-text bar-fnt-colr">Dashboards</span>
              </a>
            </li>

            <!--Main-->
            <!--stocks-->
            <li class="with-sub">
              <a href="#" aria-haspopup="true">
                <span class="menu-icon bar-fnt-colr">
                  <i class="zmdi zmdi-case-check zmdi-hc-fw"></i>
                </span>
                <span class="menu-text bar-fnt-colr">Sales</span>
              </a>
              <ul class="sidebar-submenu collapse bar-fnt-colr">
                <li class="menu-subtitle">Sales</li>
                <li><a href="<?=base_url()?>Sales">Billing</a></li>
                <li><a href="<?=base_url()?>bill_list">Invoice</a></li>
              </ul>
            </li>
            
            <!-- <li class="menu-title">Functions</li>
            <li >
              <a href="#" aria-haspopup="true">
                <span class="menu-icon bar-fnt-colr">
                  <i class="zmdi zmdi-collection-text zmdi-hc-fw"></i>
                </span>
                <span class="menu-text bar-fnt-colr">Point of Sales</span>
              </a>
            </li> -->

            <!--stocks-->
            <li class="with-sub">
              <a href="#" aria-haspopup="true">
                <span class="menu-icon bar-fnt-colr">
                  <i class="zmdi zmdi-store zmdi-hc-fw"></i>
                </span>
                <span class="menu-text bar-fnt-colr">Inventory</span>
              </a>
              <ul class="sidebar-submenu collapse bar-fnt-colr">
                <li class="menu-subtitle">Inventory</li>
                <li><a href="<?=base_url()?>available_inventory">Available Inventory</a></li>
                <li><a href="<?=base_url()?>manage_inventory">Inventory Manage</a></li>
                <li><a href="<?=base_url()?>create_inventory">Create Inventory</a></li>
              </ul>
            </li>

            <!--brands-->
            <li class="with-sub">
              <a href="#" aria-haspopup="true">
                <span class="menu-icon bar-fnt-colr">
                  <i class="zmdi zmdi-local-offer zmdi-hc-fw"></i>
                </span>
                <span class="menu-text bar-fnt-colr">Brands</span>
              </a>
              <ul class="sidebar-submenu collapse bar-fnt-colr">
                <li class="menu-subtitle">Brands</li>
                <li><a href="<?=base_url()?>available_brand">Manage Brand</a></li>
              </ul>
            </li>

            <!--categories-->
            <li class="with-sub">
              <a href="#" aria-haspopup="true">
                <span class="menu-icon bar-fnt-colr">
                  <i class="zmdi zmdi-view-comfy zmdi-hc-fw"></i>
                </span>
                <span class="menu-text bar-fnt-colr">Category</span>
              </a>
              <ul class="sidebar-submenu collapse bar-fnt-colr">
                <li class="menu-subtitle">Category</li>
                <li><a href="<?=base_url()?>available_category">Available Category</a></li>
                <li><a href="<?=base_url()?>create_category">Create Category</a></li>
                <li><a href="<?=base_url()?>report_category">Category Report</a></li>
              </ul>
            </li>

            <!--bank-->
            <li class="with-sub">
              <a href="#" aria-haspopup="true">
                <span class="menu-icon bar-fnt-colr">
                  <i class="zmdi zmdi-balance zmdi-hc-fw"></i>
                </span>
                <span class="menu-text bar-fnt-colr">Bank</span>
              </a>
              <ul class="sidebar-submenu collapse bar-fnt-colr">
                <li class="menu-subtitle">Bank</li>
                <li><a href="<?=base_url()?>">Bank Manage</a></li>
                <li><a href="<?=base_url()?>">Create Bank</a></li>
              </ul>
            </li>

            <!--Logistics-->
            <li class="with-sub">
              <a href="#" aria-haspopup="true">
                <span class="menu-icon bar-fnt-colr">
                  <i class="zmdi zmdi-truck zmdi-hc-fw"></i>
                </span>
                <span class="menu-text bar-fnt-colr">Logistics</span>
              </a>
              <ul class="sidebar-submenu collapse bar-fnt-colr">
                <li class="menu-subtitle">Logistics</li>
                <li><a href="<?=base_url()?>">Logistics Manage</a></li>
              </ul>
            </li>

            <!--Employee-->
            <li class="with-sub">
              <a href="#" aria-haspopup="true">
                <span class="menu-icon bar-fnt-colr">
                  <i class="zmdi zmdi-male-female zmdi-hc-fw"></i>
                </span>
                <span class="menu-text bar-fnt-colr">Employee</span>
              </a>
              <ul class="sidebar-submenu collapse bar-fnt-colr">
                <li class="menu-subtitle">Employee</li>
                <li><a href="<?=base_url()?>">Employee Manage</a></li>
                <li><a href="<?=base_url()?>">Employee Bonus</a></li>
                <li><a href="<?=base_url()?>">Employee Loan</a></li>
              </ul>
            </li>

          </ul>
        </div>
      </div>