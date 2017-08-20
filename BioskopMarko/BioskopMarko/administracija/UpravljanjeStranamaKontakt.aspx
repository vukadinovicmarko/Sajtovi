<%@ Page Title="" Language="C#" MasterPageFile="~/AdministracijaMaster.Master" AutoEventWireup="true" CodeBehind="UpravljanjeStranamaKontakt.aspx.cs" Inherits="BioskopMarko.administracija.UpravljanjeStranamaKontakt" %>
<asp:Content ID="Content1" ContentPlaceHolderID="head" runat="server">
</asp:Content>
<asp:Content ID="Content2" ContentPlaceHolderID="ContentPlaceHolderGore" runat="server">
</asp:Content>
<asp:Content ID="Content3" ContentPlaceHolderID="ContentPlaceHolderDole" runat="server">

    <div class="selectFilmovi col-lg-12 col-md-10 ">
        <div class="col-lg-12 gridViewPrikazIUpdate">
            <legend class="legendaUpravljanjeFilmovima">Upravljanje Stranama Kontakt</legend><br />
            <asp:GridView ID="GridViewSelectStranaKontakt" runat="server" AutoGenerateColumns="False"  HorizontalAlign="Center" CssClass="ceoGridViewFilmovi" Width="60%" HeaderStyle-CssClass="headerGridViewFilmovi" BorderColor="Transparent"   CaptionAlign="Top"   UseAccessibleHeader="False" >
                <Columns>

                    <asp:TemplateField HeaderText="Izmeni" >
                        <ItemTemplate>
                            <asp:Button ID="ButtonIzmeni" runat="server" Text="Izmeni" CommandArgument='<%# Eval("IdStraneKontakt") %>' OnClick="ButtonIzmeni_Click"  />
                        </ItemTemplate>
                    </asp:TemplateField>
                    <asp:TemplateField HeaderText="Obriši" >
                        <ItemTemplate>
                            <asp:Button ID="ButtonObrisi" runat="server" Text="Obriši" CommandArgument='<%# Eval("IdStraneKontakt") %>'  />
                        </ItemTemplate>
                    </asp:TemplateField>

                    <asp:BoundField DataField="NazivStraneKontakt" HeaderText="Naziv Strane Kontakt" ControlStyle-CssClass="univerzalnaKlasaGridViewFilmovi" >
                        <ControlStyle CssClass="univerzalnaKlasaGridViewFilmovi"></ControlStyle>
                    </asp:BoundField>
                    <asp:BoundField DataField="NaslovStraneKontakt" HeaderText="Naslov Strane Kontakt " ControlStyle-CssClass="univerzalnaKlasaGridViewFilmovi" >
                        <ControlStyle CssClass="univerzalnaKlasaGridViewFilmovi"></ControlStyle>
                    </asp:BoundField>
                    <asp:BoundField DataField="TekstStraneKontakt" HeaderText="Tekst Strane Kontakt" ControlStyle-CssClass="univerzalnaKlasaGridViewFilmovi" >
                        <ControlStyle CssClass="univerzalnaKlasaGridViewFilmovi"></ControlStyle>
                    </asp:BoundField>
                    <asp:BoundField DataField="Bioskopi" HeaderText="Bioskopi" ControlStyle-CssClass="univerzalnaKlasaGridViewFilmovi" >
                        <ControlStyle CssClass="univerzalnaKlasaGridViewFilmovi"></ControlStyle>
                    </asp:BoundField>
                    <asp:BoundField DataField="Korisnik" HeaderText="Dodao/Promenio" />
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
                                <td class="auto-style2">Naziv Strane Kontakt :</td>
                            </tr>
                            <tr>
                                <td class="auto-style1">
                                    <asp:TextBox ID="TextBoxNazivStraneKontakt" runat="server"></asp:TextBox>
                                </td>
                
                            </tr>
                            <tr>
                                <td class="auto-style2">Naslov Strane Kontakt :</td>
                            </tr>
                            <tr>
                                <td class="auto-style1">
                                    <asp:TextBox ID="TextBoxNaslovStraneKontakt" TextMode="MultiLine" Columns="30" Rows="3" runat="server"></asp:TextBox>
                                </td>
                
                            </tr>
                            <tr>
                                <td class="auto-style2">Tekst Strane Kontakt :</td>
                            </tr>
                            <tr>
                                <td class="auto-style1">
                                    <asp:TextBox ID="TextBoxTekstStraneKontakt"  TextMode="MultiLine" Columns="50" Rows="10" runat="server"></asp:TextBox>
                                </td>
                
                            </tr>
                                <td class="auto-style1">
                                    <asp:CheckBoxList ID="CheckBoxListBioskopi" runat="server"></asp:CheckBoxList>
                                </td>
                            <tr>
                                <td class="auto-style1">
                                    <asp:Button ID="ButtonUpdate" runat="server" Text="Izmeni" OnClick="ButtonUpdate_Click" />
                                    <asp:Button ID="ButtonOtkazi" runat="server" Text="Otkaži" onclick="ButtonOtkazi_Click"/>
                                </td>
                
                            </tr>
                        </table>
                    
                </div>
            </div>

</asp:Content>
