(function() {
  isWindows = navigator.platform.indexOf('Win') > -1 ? true : false;

  if (isWindows) {
    // if we are on windows OS we activate the perfectScrollbar function
    $('.sidebar .sidebar-wrapper, .main-panel').perfectScrollbar();

    $('html').addClass('perfect-scrollbar-on');
  } else {
    $('html').addClass('perfect-scrollbar-off');
  }
})();

transparent = true;
transparentDemo = true;
fixedTop = false;

navbar_initialized = false;
backgroundOrange = false;
sidebar_mini_active = false;
toggle_initialized = false;

seq = 0, delays = 80, durations = 500;
seq2 = 0, delays2 = 80, durations2 = 500;

$(document).ready(function() {

  if ($('.full-screen-map').length == 0 && $('.bd-docs').length == 0) {
    // On click navbar-collapse the menu will be white not transparent
    $('.collapse').on('show.bs.collapse', function() {
      $(this).closest('.navbar').removeClass('navbar-transparent').addClass('bg-white');
    }).on('hide.bs.collapse', function() {
      $(this).closest('.navbar').addClass('navbar-transparent').removeClass('bg-white');
    });
  }

  paperDashboard.initMinimizeSidebar();

  $navbar = $('.navbar[color-on-scroll]');
  scroll_distance = $navbar.attr('color-on-scroll') || 500;

  // Check if we have the class "navbar-color-on-scroll" then add the function to remove the class "navbar-transparent" so it will transform to a plain color.
  if ($('.navbar[color-on-scroll]').length != 0) {
    paperDashboard.checkScrollForTransparentNavbar();
    $(window).on('scroll', paperDashboard.checkScrollForTransparentNavbar)
  }

  $('.form-control').on("focus", function() {
    $(this).parent('.input-group').addClass("input-group-focus");
  }).on("blur", function() {
    $(this).parent(".input-group").removeClass("input-group-focus");
  });

  // Activate bootstrapSwitch
  $('.bootstrap-switch').each(function() {
    $this = $(this);
    data_on_label = $this.data('on-label') || '';
    data_off_label = $this.data('off-label') || '';

    $this.bootstrapSwitch({
      onText: data_on_label,
      offText: data_off_label
    });
  });
});

$(document).on('click', '.navbar-toggle', function() {
  $toggle = $(this);

  if (paperDashboard.misc.navbar_menu_visible == 1) {
    $('html').removeClass('nav-open');
    paperDashboard.misc.navbar_menu_visible = 0;
    setTimeout(function() {
      $toggle.removeClass('toggled');
      $('#bodyClick').remove();
    }, 550);

  } else {
    setTimeout(function() {
      $toggle.addClass('toggled');
    }, 580);

    div = '<div id="bodyClick"></div>';
    $(div).appendTo('body').click(function() {
      $('html').removeClass('nav-open');
      paperDashboard.misc.navbar_menu_visible = 0;
      setTimeout(function() {
        $toggle.removeClass('toggled');
        $('#bodyClick').remove();
      }, 550);
    });

    $('html').addClass('nav-open');
    paperDashboard.misc.navbar_menu_visible = 1;
  }
});

$(window).resize(function() {
  // reset the seq for charts drawing animations
  seq = seq2 = 0;

  if ($('.full-screen-map').length == 0 && $('.bd-docs').length == 0) {
    $navbar = $('.navbar');
    isExpanded = $('.navbar').find('[data-toggle="collapse"]').attr("aria-expanded");
    if ($navbar.hasClass('bg-white') && $(window).width() > 991) {
      $navbar.removeClass('bg-white').addClass('navbar-transparent');
    } else if ($navbar.hasClass('navbar-transparent') && $(window).width() < 991 && isExpanded != "false") {
      $navbar.addClass('bg-white').removeClass('navbar-transparent');
    }
  }
});

paperDashboard = {
  misc: {
    navbar_menu_visible: 0
  },

  initMinimizeSidebar: function() {
    if ($('.sidebar-mini').length != 0) {
      sidebar_mini_active = true;
    }

    $('#minimizeSidebar').click(function() {
      var $btn = $(this);

      if (sidebar_mini_active == true) {
        $('body').addClass('sidebar-mini');
        sidebar_mini_active = true;
        paperDashboard.showSidebarMessage('Sidebar mini activated...');
      } else {
        $('body').removeClass('sidebar-mini');
        sidebar_mini_active = false;
        paperDashboard.showSidebarMessage('Sidebar mini deactivated...');
      }

      // we simulate the window Resize so the charts will get updated in realtime.
      var simulateWindowResize = setInterval(function() {
        window.dispatchEvent(new Event('resize'));
      }, 180);

      // we stop the simulation of Window Resize after the animations are completed
      setTimeout(function() {
        clearInterval(simulateWindowResize);
      }, 1000);
    });
  },

  showSidebarMessage: function(message) {
    try {
      $.notify({
        icon: "now-ui-icons ui-1_bell-53",
        message: message
      }, {
        type: 'info',
        timer: 4000,
        placement: {
          from: 'top',
          align: 'right'
        }
      });
    } catch (e) {
      console.log('Notify library is missing, please make sure you have the notifications library added.');
    }

  }

};

function hexToRGB(hex, alpha) {
  var r = parseInt(hex.slice(1, 3), 16),
    g = parseInt(hex.slice(3, 5), 16),
    b = parseInt(hex.slice(5, 7), 16);

  if (alpha) {
    return "rgba(" + r + ", " + g + ", " + b + ", " + alpha + ")";
  } else {
    return "rgb(" + r + ", " + g + ", " + b + ")";
  }
}


   

  //doughnut


 


$(document).ready(function() {
  if(document.getElementById( "ClientesTable")) {
    $('#ClientesTable').DataTable( {
        dom: 'Bfrtip',
        buttons: [
            'pdfHtml5'
        ]
    } );
  }
    if(document.getElementById( "TransacoesTable")) {
    $('#TransacoesTable').DataTable( {
        dom: 'Bfrtip',
        buttons: [
            'pdfHtml5'
        ]
    } );
  }
  if(document.getElementById("EmpregadosTable")) {
    $('#EmpregadosTable').DataTable( {
        dom: 'Bfrtip',
        buttons: [
            'pdfHtml5'
        ]
    } );
  }
  if(document.getElementById("AdministradoresTable")) {
    $('#AdministradoresTable').DataTable( {
        dom: 'Bfrtip',
        buttons: [
            'pdfHtml5'
        ]
    } );
  }
} );

function CampanhasSelected(val) {
    var CampanhasSelecionadas=document.getElementById('CampanhasSelecionadas');


if(CampanhasSelecionadas.innerHTML.indexOf(val.text) !=-1){
document.getElementById('alertCampanhaSelecionada').style.display='block';
document.getElementById('user_campanha').disabled=true;
}
else {
if(CampanhasSelecionadas.innerHTML=='') {
CampanhasSelecionadas.innerHTML += '<div>' + val.text + '<i onclick="RemoverCampanhaSelected(this)"  class="fas fa-times" style="color:red;margin-left:5px;cursor:pointer"></i> </div>';
    }
    else {
CampanhasSelecionadas.innerHTML += '<div> <br>' + val.text + '<i onclick="RemoverCampanhaSelected(this)"  class="fas fa-times" style="color:red;margin-left:5px;cursor:pointer"></i> </div>';
      
    }
    
}  
}    

function RemoverCampanhaSelected(val) {
var childDivs = document.getElementById('CampanhasSelecionadas').getElementsByTagName('div');
var RemoverDiv= val.parentNode;

for( i=0; i< childDivs.length; i++ )
{
 if(childDivs[i].innerHTML == RemoverDiv.innerHTML) {
   childDivs[i].parentNode.removeChild(childDivs[i]);
 }
}

}


function  AreasInteresseSelected(val) {
    var AreasInteresse=document.getElementById('AreasInteresseSelecionadas');



if(AreasInteresse.innerHTML.indexOf(val.text) !=-1){

document.getElementById('alertAreaInteresseSelecionada').style.display='block';
document.getElementById('user_areainteresse').disabled=true;
}
else {
AreasInteresse.innerHTML += '<div class="d-inline">' + val.text + '<i onclick="RemoverAreaInteresseSelected(this)"  class="fas fa-times" style="color:red;margin-left:5px;cursor:pointer"></i> </div>';

    
}  
}    

function RemoverAreaInteresseSelected(val) {
var childDivs = document.getElementById('AreasInteresseSelecionadas').getElementsByTagName('div');
var RemoverDiv= val.parentNode;

for( i=0; i< childDivs.length; i++ )
{
 if(childDivs[i].innerHTML == RemoverDiv.innerHTML) {
   childDivs[i].parentNode.removeChild(childDivs[i]);
 }
}

}

	  $("#QRCodeTransacoes").click(function(){
		  if($("#QRCodeTransacoes").html()== 'Leitor QRCode Não Ativo') {

        let scanner = new Instascan.Scanner(
            {
                video: document.getElementById('preview')
            }
        );
        scanner.addListener('scan', function(content) {
           
            if(!isNaN(content)) {
              //alert('ID CLIENTE: ' + content);
              var id= content;
              document.getElementById('id_cartao').value= id;
              Updatepontos();
            }
            /*if(content.startsWith("b")) {
              alert('Escaneou o conteudo: ' + content);
              var campanha= content.substr(1);
              var select_campanha= document.getElementById('user_campanha');
              document.getElementById('user_campanha').value= campanha;
              CampanhasSelected(select_campanha.options[select_campanha.selectedIndex]);
            }*/
        });
        Instascan.Camera.getCameras().then(cameras => 
        {
            if(cameras.length > 0){
                scanner.start(cameras[0]);
                $("#QRCodeTransacoes").html('Leitor QRCode Ativo');
            } else {
                alert("Não existe câmera no dispositivo!");
            }
        });
		  }
		});
    
    function GuardarAreasInteressebtn() {
      var Areainteressebtn=document.getElementById('areainteressebtn');
      var childDivs = document.getElementById('AreasInteresseSelecionadas').getElementsByTagName('div');
      if(childDivs.length != 0){
      Areainteressebtn.value='';
      for( i=0; i< childDivs.length; i++ )
      {
       Areainteressebtn.value+=childDivs[i].textContent;
       }
      }
       $('#AreasInteresseModal').modal('hide');
      }

      function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
                $('#img_logo')
                .attr('src', e.target.result);
            };
                reader.readAsDataURL(input.files[0]);
            }
        }
        /*if(document.getElementsByClassName("form-control")) {
          document.getElementsByClassName("form-control")[0].removeAttribute("height");
        }*/

