<%@ Page Title="" Language="C#" MasterPageFile="~/MarkoMaster.Master" AutoEventWireup="true" CodeBehind="Oautoru.aspx.cs" Inherits="BioskopMarko.Oautoru" %>
<asp:Content ID="Content1" ContentPlaceHolderID="head" runat="server">
    <script type="text/javascript">

        $(document).ready(function () {

          

            $(".anketaGlasanje").click(function (e) {
                e.preventDefault();

                var anketa = $(this).data('anketaglasanje');
              


                var selected = $(".anketaDiv" + anketa + " input[type='radio']:checked");
                alert(selected);
                if ((selected.val()) == null) {
                    alert("morate izabrati stavku da bi glasali");
                }

                else {
                  
                    //prvo je idAnkete pa idStavke

                    var info = selected.val().split(",");


                    var id_stavke = info[0];
                    var id_ankete = info[1];


                    var podaciZaSlanje = { 'idAnkete': id_ankete, 'idStavke': id_stavke };





                    

                    $.ajax({
                        type: "POST",
                        url: "/MojWebService.asmx/Glasaj",
                        contentType: "application/json; charset=utf-8",
                        data: JSON.stringify(podaciZaSlanje),
                        dataType: 'json',
                        success: function (podaci) {


                            var poruka = "<h4>" + podaci.d + "<h4>";

                         


                            $("#porukaGlasanje").html(poruka);


                            $.ajax({
                                type: "POST",
                                url: "/MojWebService.asmx/rezultatAnkete",
                                contentType: "application/json; charset=utf-8",
                                data: JSON.stringify(podaciZaSlanje),
                                dataType: 'json',
                                success: function (podaci) {



                                    var rezultatAnkete = JSON.parse(podaci.d);
                                    var tabela = "<table>";

                                    for (var i = 0; i < rezultatAnkete.length; i++) {
                                        tabela += "<tr>";

                                        tabela += "<td>" + rezultatAnkete[i].odgovor + "</td>";
                                        tabela += "<td>" + rezultatAnkete[i].broj_glasova + "</td>";

                                        tabela += "</tr>";
                                    }

                                    tabela += "</table>";

                                    $("#rezultatAnkete").html(tabela);

                                }
                            });


                        }
                    });





                }

            });



        });

    </script>
</asp:Content>
<asp:Content ID="Content2" ContentPlaceHolderID="ContentPlaceHolderLevo" runat="server">
    <div class="centar_levo_ostalo col-xs-12 col-sm-4 col-md-4 col-lg-3 col-lg-offset-2 marginTop5p">
    
    
        <img src="/assets/images/autor/slika01.jpg" class="img-responsive img-circle" />
    
    </div>

    <div class="centar_desno_ostalo col-xs-12 col-sm-8 col-md-8 col-lg-5 marginTop5p">
        <h2 class="red">Marko Vukadinovic</h2>
        <br>    
        <p class="green">Student sam treće godine Visoke ICT skole, smer Internet Tehnologije, izabrao sam modul Web Programiranje.</p>
        <p>Moji prethodni radovi :</p>
        <p><a href="http://markovukadinovic.byethost15.com/">Pekara Marko - kurs "Web dizajn"</a></p>
        <p><a href="http://markohotel.byethost8.com/index.html">Hotel Marko - kurs "Web programiranje"</a></p>
    
    
    </div>
    <div>

         <span id="porukaGlasanje"></span>
               <div id="rezultatAnkete">

                </div>
                <div id="anketaDiv" runat="server">

                </div>
    </div>
    
</asp:Content>
