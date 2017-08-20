<%@ Page Title="" Language="C#" MasterPageFile="~/AdministracijaMaster.Master" AutoEventWireup="true" CodeBehind="UpravljanjeGalerijama.aspx.cs" Inherits="BioskopMarko.administracija.UpravljanjeGalerijama" %>
<asp:Content ID="Content1" ContentPlaceHolderID="head" runat="server">
</asp:Content>
<asp:Content ID="Content2" ContentPlaceHolderID="ContentPlaceHolderGore" runat="server">
</asp:Content>
<asp:Content ID="Content3" ContentPlaceHolderID="ContentPlaceHolderDole" runat="server">


    <div class="selectFilmovi col-lg-12 col-md-10 ">
        <div class="col-lg-12 gridViewPrikazIUpdate">
            <legend class="legendaUpravljanjeFilmovima">Upravljanje Galerijama</legend><br />
            <asp:GridView ID="GridViewSelectGalerija" runat="server" AutoGenerateColumns="False"  HorizontalAlign="Center" CssClass="ceoGridViewFilmovi" Width="60%" HeaderStyle-CssClass="headerGridViewFilmovi" BorderColor="Transparent"   CaptionAlign="Top"   UseAccessibleHeader="False" >
                <Columns>

                    <asp:TemplateField HeaderText="Izmeni" >
                        <ItemTemplate>
                            <asp:Button ID="ButtonIzmeni" runat="server" Text="Izmeni" CommandArgument='<%# Eval("IdGalerije") %>' OnClick="ButtonIzmeni_Click" />
                        </ItemTemplate>
                    </asp:TemplateField>
                    <asp:TemplateField HeaderText="Obriši" >
                        <ItemTemplate>
                            <asp:Button ID="ButtonObrisi" runat="server" Text="Obriši" CommandArgument='<%# Eval("IdGalerije") %>'  OnClick="ButtonObrisi_Click" />
                        </ItemTemplate>
                    </asp:TemplateField>

                    <asp:BoundField DataField="NazivGalerije" HeaderText="Naziv filma" ControlStyle-CssClass="univerzalnaKlasaGridViewFilmovi" >
                        <ControlStyle CssClass="univerzalnaKlasaGridViewFilmovi"></ControlStyle>
                    </asp:BoundField>
                    <asp:ImageField DataImageUrlField="PutanjaDoSlike" HeaderText="Slika" ControlStyle-CssClass="slikaFilmaGridView">
                        <ControlStyle CssClass="slikaFilmaGridView"></ControlStyle>
                    </asp:ImageField>
                    <asp:BoundField DataField="Korisnik" HeaderText="Naziv Korisnika" />
                    <asp:BoundField DataField="DatumPostavljanja" HeaderText="Datum postavljanja"  />
                    <asp:BoundField DataField="DatumIzmene" HeaderText="Datum Izmene" />
                </Columns>

        
                <HeaderStyle CssClass="headerGridViewFilmovi"></HeaderStyle>

        
                <RowStyle CssClass="univerzalnaKlasaGridViewFilmovi" />
            </asp:GridView>
            
            
                <div id="tabelaZaIzmenuGalerije" class="tabelaZaIzmenuFilmova col-lg-12 col-lg-offset-0" runat="server">
                    <div class="col-lg-6 col-lg-offset-3">
                        <table class=" table  " style="width:100%;">
                            <tr>
                                <asp:HiddenField ID="sakrivenoPolje" runat="server"/>
                            </tr>
                            <tr>
                                <td class="auto-style2">Naziv Galerije :</td>
                            </tr>
                            <tr>
                                <td class="auto-style1">
                                    <asp:TextBox ID="TextBoxNazivGalerije" runat="server"></asp:TextBox>
                                </td>
                
                            </tr>
                            
                            <tr>
                                <td class="auto-style2">Slika :</td>
                            </tr>
                            <tr>
                                <td class="auto-style1">
                                    <asp:CheckBox ID="CheckBoxFileUploadGalerijaUpdate" runat="server"  Text="zelite li da izmenite i sliku?" Checked="false"/><asp:HiddenField ID="sakrivenoPoljeSlikaPutanja" runat="server" />
                                    <asp:FileUpload ID="FileUploadGalerijaUpdate" runat="server" />
                                    </td>
                
                            </tr>
                            <tr>
                                <td class="auto-style1">
                                    <asp:Button ID="ButtonUpdate" runat="server" Text="Izmeni" onclick="ButtonUpdate_Click"/>
                                    <asp:Button ID="ButtonOtkazi" runat="server" Text="Otkaži" OnClick="ButtonOtkazi_Click" />
                                </td>
                
                            </tr>
                        </table>
                    
                </div>
            </div>
        </div>
        <div class=" col-lg-12 col-lg-offset-0 ">
            
                <legend class="legendaUpravljanjeFilmovima">Unos nove galerije</legend>
            <div class="insertFilmovi col-lg-12 col-lg-offset-0">
                <div class="col-lg-6 col-lg-offset-3">
                        <table class=" table  " style="width:100%;">
                            <tr>
                                <td class="auto-style2">Naziv Galerije :</td>
                            </tr>
                            <tr>
                                <td class="auto-style1">
                                    <asp:TextBox ID="TextBoxUnosNazivGalerije" runat="server"></asp:TextBox>
                                </td>
                
                            </tr>
                            
                            <tr>
                                <td class="auto-style2">Slika :</td>
                            </tr>
                            <tr>
                                <td class="auto-style1">
                                     <asp:FileUpload ID="FileUploadUnosGalerije" runat="server" />
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
        </div>
    </div>


</asp:Content>
