  let arrow = document.querySelectorAll(".arrow");
  for (var i = 0; i < arrow.length; i++) {
    arrow[i].addEventListener("click", (e)=>{
   let arrowParent = e.target.parentElement.parentElement;//selecting main parent of arrow
   arrowParent.classList.toggle("showMenu");
 });
  }
  let sidebar = document.querySelector(".sidebar");
  let sidebarBtn = document.querySelector(".bx-menu");
  console.log(sidebarBtn);
  sidebarBtn.addEventListener("click", ()=>{
    sidebar.classList.toggle("close");
  });


  $(document).ready(function() {
    $(".search").keyup(function () {
      var searchTerm = $(".search").val();
      var listItem = $('.results tbody').children('tr');
      var searchSplit = searchTerm.replace(/ /g, "'):containsi('")

      $.extend($.expr[':'], {'containsi': function(elem, i, match, array){
        return (elem.textContent || elem.innerText || '').toLowerCase().indexOf((match[3] || "").toLowerCase()) >= 0;
      }
    });

      $(".results tbody tr").not(":containsi('" + searchSplit + "')").each(function(e){
        $(this).attr('visible','false');
      });

      $(".results tbody tr:containsi('" + searchSplit + "')").each(function(e){
        $(this).attr('visible','true');
      });

      var jobCount = $('.results tbody tr[visible="true"]').length;
      $('.counter').text(jobCount + ' item');

      if(jobCount == '0') {$('.no-result').show();}
      else {$('.no-result').hide();}
    });
  });




$(document).ready(function() {
  
  $(document).click(function() {
     $('.dropdown-menu.show').removeClass('show');
  });
  
  $('body').on('click','.apto-trigger-dropdown', function(e){
    
    e.stopPropagation();
    
   $(this).closest('.apto-dropdown-wrapper').find('.dropdown-menu').toggleClass('show');
   // Notification
   $(this).closest('.apto-dropdown-wrapper').find('.dropdown-menu-notif').toggleClass('show');
  });

  
  
  $('body').on('click','.dropdown-item', function(e){
    
    e.stopPropagation();
    
    let $selectedValue = $(this).val(); 
    let $icon          = $(this).find('svg');
    let $btn           = $(this).closest('.apto-dropdown-wrapper').find('.apto-trigger-dropdown');
    
   $(this).closest('.apto-dropdown-wrapper').find('.dropdown-menu').removeClass('show').attr('data-selected', $selectedValue);
    
    $btn.find('svg').remove();
    $btn.prepend($icon[0].outerHTML);
    
  });

// Notification
    $('body').on('click','.dropdown-item-notif', function(e){
    
    e.stopPropagation();
    
    let $selectedValue = $(this).val(); 
    let $icon          = $(this).find('svg');
    let $btn           = $(this).closest('.apto-dropdown-wrapper').find('.apto-trigger-dropdown');
    
   $(this).closest('.apto-dropdown-wrapper').find('.dropdown-menu-notif').removeClass('show').attr('data-selected', $selectedValue);
    
    $btn.find('svg').remove();
    $btn.prepend($icon[0].outerHTML);
    
  });
  
}); 