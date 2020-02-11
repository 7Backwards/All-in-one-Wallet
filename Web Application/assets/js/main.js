$(function(){
	$("#wizard").steps({
        headerTag: "h2",
        bodyTag: "section",
        transitionEffect: "fade",
        enableAllSteps: true,
        transitionEffectSpeed: 500,
        labels: {
            next: "Seguinte",
            previous: "Anterior"
        }

    });
    $('.wizard > .steps li a').click(function(){
    	$(this).parent().addClass('checked');
		$(this).parent().prevAll().addClass('checked');
		$(this).parent().nextAll().removeClass('checked');
    });
    // Custome Jquery Step Button
    $('.forward').click(function(){
    	$("#wizard").steps('next');
    })
    $('.backward').click(function(){
        $("#wizard").steps('previous');
    })
    // Select Dropdown
    $('html').click(function() {
        $('.select .dropdown').hide(); 
    });
    $('.select').click(function(event){
        event.stopPropagation();
    });
    $('.select .select-control').click(function(){
        $(this).parent().next().toggle();
    })    
    $('.select .dropdown li').click(function(){
        $(this).parent().toggle();
        var text = $(this).attr('rel');
        $(this).parent().prev().find('div').text(text);
    })
})


function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function (e) {
            $('#img_cartao')
            .attr('src', e.target.result);
        };
            reader.readAsDataURL(input.files[0]);
        }
    }

function doc1check(){
       document.getElementById('check1').style.display ='block';
}



// Get the modal
var modal1 = document.getElementById("TermosResponsabilidadeModal");
modal1.style.display="none";
// When the user clicks on the button, open the modal
function OpenTermosResponsabilidadeModal() {
    modal1.style.display = "block";
}
// When the user clicks on <span> (x), close the modal
function spancloseTermosResponsabilidade() {
    modal1.style.display = "none";
}
window.onclick = function(event) {
    if (event.target == modal1) {
       modal1.style.display= "none";
       }
    }



// Get the modal
var modal = document.getElementById("AreasInteresseModal");

// Get the button that opens the modal
var btn = document.getElementById("areainteressebtn");
// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];
// When the user clicks on the button, open the modal
function OpenAreasInteresseModal() {
    modal.style.display = "block";
}
// When the user clicks on <span> (x), close the modal
span.onclick = function() {
    modal.style.display = "none";
}
// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
if (event.target == modal) {
   modal.style.display = "none";
   modal1.style.display= "none";
   }
}



function  AreasInteresseSelected(val) {
    var AreasInteresse=document.getElementById('AreasInteresseSelecionadas');
        var Areainteressebtn=document.getElementById('areainteressebtn');

if(AreasInteresse.innerHTML.indexOf(val.text) !=-1){

document.getElementById('alertAreaInteresseSelecionada').style.display='block';
document.getElementById('user_areainteresse').disabled=true;
}
else {
AreasInteresse.innerHTML += '<div style="display:inline">' + val.text + '<i onclick="RemoverAreaInteresseSelected(this)"  class="fas fa-times" style="color:red;margin-left:5px;cursor:pointer"></i> </div>';
    
}  
}   

function RemoverAreaInteresseSelected(val) {
var childDivs = document.getElementById('AreasInteresseSelecionadas').getElementsByTagName('div');
        var Areainteressebtn=document.getElementById('areainteressebtn');
var RemoverDiv= val.parentNode;

for( i=0; i< childDivs.length; i++ )
{
 if(childDivs[i].innerHTML == RemoverDiv.innerHTML) {
   childDivs[i].parentNode.removeChild(childDivs[i]);

 }
}

}

function GuardarAreasInteressebtn() {
var Areainteressebtn=document.getElementById('areainteressebtn');
var childDivs = document.getElementById('AreasInteresseSelecionadas').getElementsByTagName('div');
Areainteressebtn.value='';
for( i=0; i< childDivs.length; i++ )
{
 Areainteressebtn.value+=childDivs[i].textContent;

 }
modal.style.display = "none";
}

function check(){
  if (document.getElementById('text_password').value == document.getElementById('text_confpassword').value) {
    document.getElementById('message').style.color = 'green';
    document.getElementById('message').innerHTML = "As passwords coincidem!";
  } else {
    document.getElementById('message').style.color = 'red';
    document.getElementById('message').innerHTML = "Por favor confirme se as passwords coincidem!";
  }
}

/*function validator(){

              var pnome = document.getElementById('text_PNome');
              var unome =   document.getElementById('text_UNome');
              var telefone =   document.getElementById('text_tele');
              var nif =   document.getElementById('text_nif');
              var email =   document.getElementById('text_email');
              var datanasc =   document.getElementById('text_datanasc');
              var pass =   document.getElementById('text_password');
             // var genero =   document.getElementById('genero');
              var nomeEstabelecimento =   document.getElementById('text_nomeEstabelecimento');
              var morada =   document.getElementById('text_morada');
              var codpostal =   document.getElementById('text_codpostal');
              var cidade =   document.getElementById('text_cidade');
              var AreaInteresse = document.getElementById('areainteressebtn');
              var descricao =   document.getElementById('text_descricao');
              var doc1 =   document.getElementById('upload_doc1');
              var gpontos =   document.getElementById('text_Gpontos');
              var upontos =   document.getElementById('text_Upontos');
              var Logotipo =   document.getElementById('Logotipo');


           if ((AreaInteresse.value) && (pnome.value )&&(unome.value)&&(telefone.value)&&(nif.value)&&(email.value)&&(datanasc.value)&&(pass.value)&&(nomeEstabelecimento.value)&&(morada.value)&&(codpostal.value)&&(cidade.value)&&(descricao.value)&&(doc1.value)&&(gpontos.value)&&(upontos.value)&&(Logotipo.value)) 
           {
            document.getElementById('concluir').style.display ='block';
          }
           
}
*/
