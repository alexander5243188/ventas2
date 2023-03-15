<script src="{{ asset('assets/js/loader.js') }}"></script>
<link href="{{ asset('assets/css/loader.css') }}" rel="stylesheet" type="text/css" />

<link href="https://fonts.googleapis.com/css?family=Quicksand:400,500,600,700&display=swap" rel="stylesheet">

<link href="{{ asset('bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('assets/css/plugins.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('assets/css/structure.css') }}" rel="stylesheet" type="text/css" class="structure" />

<link href="{{ asset('plugins/font-icons/fontawesome/css/fontawesome.css') }}" rel="stylesheet" type="text/css">
<link href="{{ asset('css/fontawesome.css') }}" rel="stylesheet" type="text/css" />

<link href="{{ asset('assets/css/elements/avatar.css') }}" rel="stylesheet" type="text/css" />

<link href="{{ asset('plugins/sweetalerts/sweetalert.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('plugins/notification/snackbar/snackbar.min.css') }}" rel="stylesheet" type="text/css" />


<link href="{{ asset('css/custom.css') }}" rel="stylesheet" type="text/css" />

<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/widgets/modules-widgets.css') }}">   
<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/forms/theme-checkbox-radio.css') }}">

 <link href="{{ asset('assets/css/apps/scrumboard.css') }}" rel="stylesheet" type="text/css" />
 <link href="{{ asset('assets/css/apps/notes.css') }}" rel="stylesheet" type="text/css" /> 
 
 <link rel="stylesheet" href="{{ asset('css/apexcharts.css') }}">
<style>
	aside {
		display: none!important;
	}
	.page-item.active .page-link {
		z-index: 3;
		color: #fff;
		background-color: #3b3f5c;
		border-color: #3b3f5c;
	}

	@media (max-width: 480px) 
	{
		.mtmobile {
			margin-bottom: 20px!important;
		}
		.mbmobile {
			margin-bottom: 10px!important;
		}
		.hideonsm {
			display: none!important;
		}
		.inblock {
			display: block;
		}
	}

	/*sidebar background*/
	.sidebar-theme #compactSidebar {background: #023E8A!important;}

	/*sidebar collapse background */
	.header-container .sidebarCollapse {color: #023E8A!important;}
	
	/**button*/		
	#button-edit{
		background: #023E8A!important; color:white!important;
		padding: 0.25rem 0.5rem;
		font-size: 0.875rem;
		line-height: 1.5;
	}	

	#button-delete{
		background: #ff0000!important; color:white!important;
		padding: 0.25rem 0.5rem;
    	font-size: 0.875rem;
    	line-height: 1.5;
	}	
	#button-shopping{
		background: #f0ad4e!important; color:white!important;
		padding: 0.25rem 0.5rem;
    	font-size: 0.875rem;
    	line-height: 1.5;
	}
	#button-close{background-color:#023E8A!important; color:white!important;}
	#button-save{background: #023E8A!important; color:white!important;}
	#button-update{background: #023E8A!important; color:white!important;}
	#button-import{background: #023E8A!important; color:white!important;}
	#button-add{background: #023E8A!important; color:white!important;}
	
	#button-consult{background: #023E8A!important; color:white!important;}
	#button-print{background: #023E8A!important; color:white!important;}
	#button-consult{background: #023E8A!important; color:white!important;}
	.button-generate{background: #023E8A!important; color:white!important;}
	.button-export{background: #023E8A!important; color:white!important;}
	#button-inventory{background: #023E8A!important; color:white!important;}
	#button-denomination{background: #023E8A!important; color:white!important;}
	#button-effective{background: #023E8A!important; color:white!important;}
	#button-backspace{background: #023E8A!important; color:white!important;}
	
	#button-consulst{background: #023E8A!important; color:white!important;}

	#button-cancel{		background: #023E8A!important; color:white!important;			}

	/*** BOTONES DETALLE DE VENTA */
	#button-minus{
		background: #5CB85C!important; color:white!important;
		padding: 0.25rem 0.5rem;
    	font-size: 0.875rem;
    	line-height: 1.5;
	}
	#button-plus{
		background: #198754!important; color:white!important;
		padding: 0.25rem 0.5rem;
    	font-size: 0.875rem;
    	line-height: 1.5;
	}	
	#button-delete{
		background: ##f86c6b!important; color:white!important;
		padding: 0.25rem 0.5rem;
    	font-size: 0.875rem;
    	line-height: 1.5;
	}

	/** */
	label { 
		font-weight: bold!important; 
		color: #000000!important;	
	}
	/** */
	#button-list{background: #198754!important; color:white!important;}
	#button-print{background: #BB2D3B!important; color:white!important;}
	
	.button-inventario{background: #023E8A!important; color:white!important;}
	.button-mayorista{background: #023E8A!important; color:white!important;}
	.button-usuario{background: #023E8A!important; color:white!important;}
	.button-herramienta{background: #023E8A!important; color:white!important;}

	.button-sync-all{background: #023E8A!important; color:white!important;}
	.button-revoke-all{background: #023E8A!important; color:white!important;}

	/**Table */
	#table-head{background: #023E8A!important;}

	/**Modal */
	#modal-head{background: #023E8A!important;}
	
	/**search */
	#input-search{background: #023E8A!important;}

	/**user img */
	#user-img{
		height: 100px;
 		width: 100px;
	}

	/**modal img */
	#modal-img{
		height:190px; 
        width:190px;
	}
	/**report sale total */
	#sale-total{background: #023E8A!important; color:white!important;}



	.navbar .navbar-item .nav-item form.form-inline input.search-form-control {
		font-size: 15px;
		background-color: #7CAA2D!important;
		padding-right: 40px;
		padding-top: 12px;
		border: none;
		color: #fff;
		box-shadow: none;
		border-radius: 30px;
	}


</style>


 <link href="{{ asset('plugins/flatpickr/flatpickr.dark.css') }}" rel="stylesheet" type="text/css" /> 

@livewireStyles