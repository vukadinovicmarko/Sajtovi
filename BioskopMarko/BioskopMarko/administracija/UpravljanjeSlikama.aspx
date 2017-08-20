<%@ Page Title="" Language="C#" MasterPageFile="~/AdministracijaMaster.Master" AutoEventWireup="true" CodeBehind="UpravljanjeSlikama.aspx.cs" Inherits="BioskopMarko.administracija.UpravljanjeSlikama" %>
<asp:Content ID="Content1" ContentPlaceHolderID="head" runat="server">
</asp:Content>
<asp:Content ID="Content2" ContentPlaceHolderID="ContentPlaceHolderGore" runat="server">
</asp:Content>
<asp:Content ID="Content3" ContentPlaceHolderID="ContentPlaceHolderDole" runat="server">




    <div><asp:DropDownList ID="DropDownListGalerije" runat="server" AutoPostBack="true" OnSelectedIndexChanged="DropDownListGalerije_SelectedIndexChanged"></asp:DropDownList></div>


        <script type="text/javascript">
             $(document).ready(function () {
                 $('.ajaxBrisanje').click(function (e) {
                     e.preventDefault();

                     var tekuci = $(this);
                     var idSlike = $(this).data('idslika');
                     alert(idSlike);
                   
                    
                         $.ajax({
                             type: "POST",
                             url: "/MojWebService.asmx/izbrisiSliku",
                             contentType: "application/json; charset=utf-8",
                             data: JSON.stringify({ idSlike: idSlike }), //ovaj tekst mora da sse zove isto kao i paramatear u ajaxMetodi
                             //JSON.stringify pretvara bilo koji objekat u string
                             dataType: 'json',
                             success: function (podaci) {


                                 alert(podaci.d);
                                 //svi podaci koje vraca ajax su u svojstvu d
                                 //i onda ako oces da im pistupis pises podaci.d


                                 tekuci.val("you have just deleted this item");

                                //tekuci.text = "izbrisano";
                             }
                         });
                    
                     //if (operacija == "druga") {
                     //    var podaciZaSlanje = { 'o': osoba }; //mora i ovdje da se zove o jer tamo u parametru se zove o
                     //    $.ajax({
                     //        type: "POST",
                     //        url: "MojWebService.asmx/vratiOsobu",
                     //        contentType: "application/json; charset=utf-8",
                     //        data: JSON.stringify(podaciZaSlanje),
                     //        dataType: 'json',
                     //        success: function (podaci) {

                     //            var ja = JSON.parse(podaci.d);

                     //            alert(ja.Ime);

                     //        }
                     //    });
                     //}
                 });
             });
    </script>




    <div class="selectFilmovi col-lg-12 col-md-10 ">
        <div class="col-lg-12 gridViewPrikazIUpdate">
            <legend class="legendaUpravljanjeFilmovima">Upravljanje Slikama</legend><br />

            <asp:GridView ID="GridViewUpravljanjeSlikama" CssClass="ceoGridViewSlike" runat="server" HeaderStyle-CssClass="headerGridViewFilmovi" HorizontalAlign="Center" Width="70%" BorderColor="Transparent"    UseAccessibleHeader="False"    CaptionAlign="Top" AutoGenerateColumns="False">



        <Columns>
            <asp:TemplateField >
                <ItemTemplate>
                    <asp:Button ID="ButtonIzmeni" runat="server" Text="Izmeni" CommandArgument='<%# Eval("IdSlike") %>' OnClick="ButtonIzmeni_Click" />
                </ItemTemplate> 
               
            </asp:TemplateField>
            <asp:TemplateField >
                <ItemTemplate>
                    <asp:Button ID="ButtonIzbrisi" runat="server" Text="Izbrisi" 
                         data-idslika ='<%# Eval("IdSlike") %>'  CssClass="ajaxBrisanje"/>
                </ItemTemplate> 
                <%-- CommandArgument='<%# Bind("idSlike") %>' --%>
            </asp:TemplateField>
            
            <asp:BoundField DataField="NazivSlike" HeaderText="Naziv slike" />
            <asp:ImageField DataImageUrlField="PutanjaDoSlike" HeaderText="Slika" ControlStyle-CssClass="slikaFilmaGridView">
            </asp:ImageField>
            <asp:BoundField DataField="NazivGalerije" HeaderText="Galerija" />
            <asp:BoundField DataField="Korisnik" HeaderText="Dodao/Izmenio" />
            <asp:BoundField DataField="DatumPostavljanja" HeaderText="Datum Postavljanja" />
            <asp:BoundField DataField="DatumIzmene" HeaderText="Datum Izmene" />
            
        </Columns>

        <%--<FooterStyle BackColor="#C6C3C6" ForeColor="Black"></FooterStyle>

        <HeaderStyle BackColor="#4A3C8C" Font-Bold="True" ForeColor="#E7E7FF"></HeaderStyle>

        <PagerStyle HorizontalAlign="Right" BackColor="#C6C3C6" ForeColor="Black"></PagerStyle>

        <RowStyle BackColor="#DEDFDE" ForeColor="Black"></RowStyle>

        <SelectedRowStyle BackColor="#9471DE" Font-Bold="True" ForeColor="White"></SelectedRowStyle>

        <SortedAscendingCellStyle BackColor="#F1F1F1"></SortedAscendingCellStyle>

        <SortedAscendingHeaderStyle BackColor="#594B9C"></SortedAscendingHeaderStyle>

        <SortedDescendingCellStyle BackColor="#CAC9C9"></SortedDescendingCellStyle>

        <SortedDescendingHeaderStyle BackColor="#33276A"></SortedDescendingHeaderStyle>--%>

    <HeaderStyle CssClass="headerGridViewFilmovi"></HeaderStyle>
    </asp:GridView>
            <div id="tabelaZaIzmenuSlika" class="tabelaZaIzmenuSlika col-lg-12 col-lg-offset-0" runat="server">
                    <div class="col-lg-6 col-lg-offset-3">
                        <table class=" table  " style="width:100%;">
                            <tr>
                                <asp:HiddenField ID="sakrivenoPolje" runat="server"/>
                                
                            </tr>
                            <tr>
                                <td class="auto-style2">Naziv slike :</td>
                            </tr>
                            <tr>
                                <td class="auto-style1">
                                    <asp:TextBox ID="TextBoxNazivSlike" runat="server"></asp:TextBox>
                                </td>
                
                            </tr>
                            
                            <tr>
                                <td class="auto-style2">Slika :</td>
                            </tr>
                            <tr>
                                <td class="auto-style1">
                                    <asp:CheckBox ID="CheckBoxFileUploadSlika" runat="server"  Text="Želite li da izmenite i sliku?" Checked="false"/><asp:HiddenField ID="sakrivenoPoljeSlikaPutanja" runat="server" />
                                    <asp:FileUpload ID="FileUploadSlika" runat="server" />
                                    </td>
                
                            </tr>
                           
                            <tr>
                                <td class="auto-style1">
                                    <asp:DropDownList ID="DropDownListSlike" runat="server">
                                    </asp:DropDownList>
                                </td>
                
                            </tr>
                            <tr>
                                <td class="auto-style1">
                                    <asp:Button ID="ButtonUpdate" runat="server" Text="Izmeni" OnClick="ButtonUpdate_Click"  />
                                    <asp:Button ID="ButtonOtkazi" runat="server" Text="Otkaži" OnClick="ButtonOtkazi_Click" />
                                </td>
                
                            </tr>
                            
                        </table>
                    
                </div>
            </div>
            </div>
        </div>
    <div class="col-lg-12 col-lg-offset-0">
        <legend class="legendaUpravljanjeFilmovima">Unos novih slika</legend>
        <div class="insertFilmovi col-lg-12 col-lg-offset-0">
                <div class="col-lg-6 col-lg-offset-3">
                        <table class=" table  " style="width:100%;">
                            
                            <tr>
                                <td class="auto-style2">Naziv slike :</td>
                            </tr>
                            <tr>
                                <td class="auto-style1">
                                    <asp:TextBox ID="TextBoxUnosSlikaNaziv" runat="server"></asp:TextBox>
                                </td>
                
                            </tr>
                            
                            <tr>
                                <td class="auto-style2">Slika :</td>
                            </tr>
                            <tr>
                                <td class="auto-style1">
                                    
                                    <asp:FileUpload ID="FileUploadUnosSlika" runat="server" />
                                    </td>
                
                            </tr>
                            <tr>
                                <td class="auto-style2">Izaberite Galeriju u kojoj će biti slika :</td>
                             </tr>
                            <tr>
                                <td class="auto-style1">
                                    <asp:DropDownList ID="DropDownListUnosSlika" runat="server">
                                    </asp:DropDownList>
                                </td>
                
                            </tr>
                            <tr>
                                <td class="auto-style1">
                                    <asp:Button ID="ButtonUnos" runat="server" Text="Unesi" OnClick="ButtonUnos_Click" />
                                    
                                </td>
                
                            </tr>
                            
                        </table>
                    
                </div>
    </div>





</asp:Content>
