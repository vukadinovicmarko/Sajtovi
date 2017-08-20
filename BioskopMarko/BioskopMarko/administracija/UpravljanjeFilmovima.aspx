<%@ Page Title="" Language="C#" MasterPageFile="~/AdministracijaMaster.Master" AutoEventWireup="true" CodeBehind="UpravljanjeFilmovima.aspx.cs" enableEventValidation="false" Inherits="BioskopMarko.administracija.UpravljanjeFilmovima" %>
<asp:Content ID="Content1" ContentPlaceHolderID="head" runat="server">
    
</asp:Content>
<asp:Content ID="Content2" ContentPlaceHolderID="ContentPlaceHolderGore" runat="server">

</asp:Content>
<asp:Content ID="Content3" ContentPlaceHolderID="ContentPlaceHolderDole" runat="server">
    
    
    
    <div class="selectFilmovi col-lg-12 col-md-10 ">
        <div class="col-lg-12 gridViewPrikazIUpdate">
            <legend class="legendaUpravljanjeFilmovima">Upravljanje Filmovima</legend><br />
            <asp:GridView ID="GridViewSelectFilmova" runat="server" AutoGenerateColumns="False"  HorizontalAlign="Center" CssClass="ceoGridViewFilmovi" HeaderStyle-CssClass="headerGridViewFilmovi" BorderColor="Transparent"   CaptionAlign="Top"   UseAccessibleHeader="False" >
                <Columns>
                    <asp:TemplateField HeaderText="Izmeni" >
                        <ItemTemplate>
                            <asp:Button ID="ButtonIzmeni" runat="server" Text="Izmeni" CommandArgument='<%# Eval("IdFilma") %>' OnClick="ButtonIzmeni_Click" />
                        </ItemTemplate>
                    </asp:TemplateField>
                    <asp:TemplateField HeaderText="Obriši" >
                        <ItemTemplate>
                            <asp:Button ID="ButtonObrisi" runat="server" Text="Obriši" CommandArgument='<%# Eval("IdFilma") %>' OnClick="ButtonObrisi_Click" />
                        </ItemTemplate>
                    </asp:TemplateField>
                    <asp:BoundField DataField="NazivFilma" HeaderText="Naziv filma" ControlStyle-CssClass="univerzalnaKlasaGridViewFilmovi" >

                        <ControlStyle CssClass="univerzalnaKlasaGridViewFilmovi"></ControlStyle>

                    </asp:BoundField>
                    <asp:BoundField DataField="NazivBioskopa" HeaderText="Naziv bioskopa" >

                    </asp:BoundField>
                    <asp:BoundField DataField="OpisFilma" HeaderText="Opis" />
                    <asp:BoundField DataField="OcenaFilma" HeaderText="Ocena" />
                    <asp:BoundField DataField="DatumPostavljanja" HeaderText="Datum postavljanja" DataFormatString="{0:dd.MM.yyyy}" />
                    <asp:ImageField DataImageUrlField="PutanjaSlikeFilma" HeaderText="Slika" ControlStyle-CssClass="slikaFilmaGridView">
                        <ControlStyle CssClass="slikaFilmaGridView"></ControlStyle>
                    </asp:ImageField>
                    <asp:BoundField  DataField="ZanroviFilma" HeaderText="Zanr Filma" />
                    <asp:BoundField DataField="Korisnik" HeaderText="Naziv Korisnika" />
                </Columns>

        
                <HeaderStyle CssClass="headerGridViewFilmovi"></HeaderStyle>

        
                <RowStyle CssClass="univerzalnaKlasaGridViewFilmovi" />
            </asp:GridView>
            
            
                <div id="tabelaZaIzmenuFilmova" class="tabelaZaIzmenuFilmova col-lg-12 col-lg-offset-0" runat="server">
                    <div class="col-lg-6 col-lg-offset-3">
                        <table class=" table  " style="width:100%;">
                            <tr>
                                <asp:HiddenField ID="sakrivenoPolje" runat="server"/>
                            </tr>
                            <tr>
                                <td class="auto-style2">Naziv filma :</td>
                            </tr>
                            <tr>
                                <td class="auto-style1">
                                    <asp:TextBox ID="TextBoxNazivFilma" runat="server"></asp:TextBox>
                                </td>
                
                            </tr>
                            <tr>
                                <td class="auto-style2">Bioskop :</td>
                             </tr>
                            <tr>
                                <td class="auto-style1">
                                    <asp:DropDownList ID="DropDownListBioskopi" runat="server">
                                    </asp:DropDownList>
                                </td>
                
                            </tr>
                            <tr>
                                <td class="auto-style2">Opis filma :</td>
                            </tr>
                            <tr>
                                <td class="auto-style1">
                                    <asp:TextBox ID="TextBoxOpisFilma" runat="server"></asp:TextBox>
                                </td>
                
                            </tr>
                            <tr>
                                <td class="auto-style2">Ocena :</td>
                            </tr>
                            <tr>
                                <td class="auto-style1">
                                    <asp:TextBox ID="TextBoxOcena" runat="server"></asp:TextBox>
                                </td>
                            </tr>
                            <tr>
                                <td class="auto-style2">Slika :</td>
                            </tr>
                            <tr>
                                <td class="auto-style1">
                                    <asp:CheckBox ID="CheckBoxFileUpload" runat="server"  Text="zelite li da izmenite i sliku?" Checked="false"/><asp:HiddenField ID="sakrivenoPoljeSlikaPutanja" runat="server" />
                                    <asp:FileUpload ID="FileUploadSlika" runat="server" />
                                    </td>
                
                            </tr>
                            <tr>
                                <td class="auto-style2">Zanr :</td>
                            </tr>
                            <tr>
                                <td class="auto-style1">
                                    <asp:CheckBoxList ID="CheckBoxListZanr" runat="server">
                                    </asp:CheckBoxList>
                                </td>
                            </tr>
            
                            <tr>
                                <td class="auto-style1">
                                    <asp:Button ID="ButtonUpdate" runat="server" Text="Izmeni" OnClick="ButtonUpdate_Click" />
                                    <asp:Button ID="ButtonOtkazi" runat="server" OnClick="ButtonOtkazi_Click" Text="Otkaži" />
                                </td>
                
                            </tr>
                        </table>
                    
                </div>
            </div>
        </div>
        <div class=" col-lg-12 col-lg-offset-0 ">
            
                <legend class="legendaUpravljanjeFilmovima">Unos novog filma</legend>
            <div class="insertFilmovi col-lg-12 col-lg-offset-0">
                <div class="col-lg-6 col-lg-offset-3">
                    <table class="tabelaInsertFilmovi table  " style="width:100%;">
            
                        <tr>
                            <td class="auto-style2 tabelaInsertFilmoviHeader">Naziv filma :</td>
                        </tr>
                        <tr>
                            <td class="auto-style1">
                                <asp:TextBox ID="TextBoxNazivFilmaZaInsert" runat="server"></asp:TextBox>
                            </td>
               
                         </tr>
                        <tr>
                             <td class="auto-style2 tabelaInsertFilmoviHeader">Bioskop :</td>
                        </tr>
                        <tr>
                            <td class="auto-style1">
                                <asp:DropDownList ID="DropDownListBioskopZaInsert" runat="server">
                                </asp:DropDownList>
                            </td>
                        </tr>
                        <tr>
                            <td class="auto-style2 tabelaInsertFilmoviHeader">Ocena :</td>
                        </tr>
                        <tr>
                            <td class="auto-style1">
                                <asp:TextBox ID="TextBoxOcenaZaInsert" runat="server"></asp:TextBox>
                            </td>
                        </tr>
                        <tr>
                            <td class="auto-style2 tabelaInsertFilmoviHeader">Slika :</td>
                        </tr>
                        <tr>
                           <td class="auto-style1">
                               <asp:FileUpload ID="FileUploadFileSlikaZaInsert" runat="server" />
                            </td>
                        </tr>
                        <tr>
                             <td class="auto-style2 tabelaInsertFilmoviHeader">Opis filma :</td>
                
                        </tr>
            
                        <tr>
                            <td class="auto-style1">
                                <asp:TextBox ID="TextBoxOpisFilmaZaInsert" TextMode="MultiLine" Rows="5" Columns ="50" runat="server"></asp:TextBox>
                            </td>
                        </tr>
                        <tr>
                            <td class="auto-style2 tabelaInsertFilmoviHeader">Zanr :</td>
                        </tr>
                        <tr>
                            <td class="auto-style1">
                                <asp:CheckBoxList ID="CheckBoxListZanrZaInsert" runat="server" CssClass="zanrTabelaZaInsert">
                                </asp:CheckBoxList>
                            </td>
                        </tr>
                        <tr>
                            <td class="auto-style1">
                                <asp:Button ID="ButtonUnesi" runat="server" Text="Unesi Film" OnClick="ButtonUnesi_Click"/>
                    
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>


    
</asp:Content>