$(function(){
	$('.post h2, .post h3').each(function(){
		var raw = $(this).text().toLowerCase().replace(/[^a-z0-9]+/g,'_');
		var pID = $(this).parent().parent().attr('id');
		$(this).attr('id', raw+'_'+pID);
	});
	$('.post [data-role="possum"]').each(function(){
		$(this).appendTo($(this).parent().parent().parent().siblings('.possum-bar'));
		var relatedTarget = $(this).parent().parent().find('#'+$(this).attr('id'));
		var relatedTargetPos = $(relatedTarget).position();
		$(this).css('top',relatedTargetPos.top)
	});
});