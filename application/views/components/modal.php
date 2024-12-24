<!-- Modal -->
<div class="modal fade" id="mainModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"  aria-hidden="true">
  	<div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
    	<div class="modal-content">
	      	
	      	<div class="modal-header hstack py-2">
		        
		        <span class="modal-title me-auto fw-bolder"></span>

		        <button type="button" class="btn border-0 p-0 fw-bolder bg-transparent fs-5 text-muted" data-bs-dismiss="modal" aria-label="Close">
			      	<i class="fas fa-times"></i>
			    </button>

	      	</div>
	      	
	      	<div class="modal-body" style="margin-bottom: 1rem; min-height: 300px">
	      		
            </div>
    	</div>
  	</div>

  	<?php $this->load->view("components/please_wait_animation"); ?>
</div>

<script>
	mainModal = function()
	{
		document.getElementById("mainModal").addEventListener("hidden.bs.modal", event => {
		    const modal = $("div[id='mainModal']");
	        	  modal.find(".modal-header").removeAttr("style");
	        	  modal.find(".modal-title").html(null);
	        	  modal.find(".sub-title").html(null);
	        	  modal.find(".modal-dialog").attr("class", "modal-dialog modal-dialog-centered modal-dialog-scrollable");
	    });
	}
	mainModal();
</script>