(function(){
	function Gallery_Filter(el,galleryData){
		this.gll_filter = el;
		this.gll_filterList = this.gll_filter.find('.gallery_nav_text');
		this.filter_current = "all";
		this.filter_trigger = "";
		
		this.gll_filter.on('click',function(evt){
			 event.preventDefault();
			
			this.filter_trigger = $(evt.target).data('dir');
			if(this.filter_trigger){
				this.gll_filterList.removeClass('gallery_nav_text--active');
				$(evt.target).addClass('gallery_nav_text--active');
				el.trigger('OpChange', this.filter_trigger);
			}
		}.bind(this));
	}

  window.Gallery_Filter = Gallery_Filter;
}());