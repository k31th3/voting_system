<div class="offcanvas" tabindex="-1" id="offCanvasMain" data-bs-backdrop="static">
  <div class="offcanvas-header">

    <div class="offcanvas-title me-auto"></div>

    <button type="button" class="btn text-success px-2 py-1 shadow" data-bs-dismiss="offcanvas" aria-label="Close" style="transition: revert;">
      <i class="fas fa-times"></i>
    </button>

  </div>
  <div class="offcanvas-body position-relative">
    
  </div>

  <?php $this->load->view("components/please_wait_animation"); ?>
</div>

<script>
  offCanvasMain = function()
  {
    document.getElementById("offCanvasMain").addEventListener("hidden.bs.offcanvas", event => 
    {
      const canvas = $("div[id='offCanvasMain']");
            canvas.find(".offcanvas-header").removeAttr("style");
            canvas.find(".offcanvas-body").html(null);
            canvas.find(".offcanvas-title").html(null);
            canvas.attr("class", "offcanvas");
    });
  }
  offCanvasMain();
</script>