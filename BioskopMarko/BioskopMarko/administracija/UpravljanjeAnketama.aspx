<%@ Page Title="" Language="C#" MasterPageFile="~/AdministracijaMaster.Master" AutoEventWireup="true" CodeBehind="UpravljanjeAnketama.aspx.cs" Inherits="BioskopMarko.administracija.UpravljanjeAnketama" %>
<asp:Content ID="Content1" ContentPlaceHolderID="head" runat="server">
</asp:Content>
<asp:Content ID="Content2" ContentPlaceHolderID="ContentPlaceHolderGore" runat="server">


</asp:Content>
<asp:Content ID="Content3" ContentPlaceHolderID="ContentPlaceHolderDole" runat="server">
     <div id="anketaPrikaz">
        <asp:DropDownList ID="DropDownListSveAnkete" runat="server" OnSelectedIndexChanged="DropDownListSveAnkete_SelectedIndexChanged" AutoPostBack="True">
            <asp:ListItem Value="0">chose survey for editing</asp:ListItem>

        </asp:DropDownList>

        <br />
        <asp:LinkButton ID="LinkButtonEdit" runat="server" OnClick="LinkButtonEdit_Click">Edit selected survey</asp:LinkButton>


        <asp:LinkButton ID="LinkButtonDelete" runat="server" OnClick="LinkButtonDelete_Click">Delete selected survey</asp:LinkButton>



        <asp:LinkButton ID="LinkButtonInsertSurvey" runat="server" OnClick="LinkButtonInsertSurvey_Click">Make a new survey</asp:LinkButton>


        <br />

    </div>


    <div id="divPrikazStavki" runat="server">
        <asp:GridView ID="GridViewStavke" CssClass="ceoGridViewFilmovi" HeaderStyle-CssClass="headerGridViewFilmovi" runat="server" AutoGenerateColumns="False">



            <Columns>
                <asp:TemplateField>

                    
                    <ItemTemplate>
                        <asp:Button ID="ButtonIzmeniStavku" runat="server" Text="update" OnClick="ButtonIzmeniStavku_Click"
                             CommandArgument='<%# Eval("Id_stavke") %>'/>
                    </ItemTemplate>

                    
                </asp:TemplateField>
                <asp:TemplateField>

                 <ItemTemplate>
                        <asp:Button ID="ButtonIzbrisiStavku" runat="server" Text="delete" OnClick="ButtonIzbrisiStavku_Click"
                            CommandArgument='<%# Eval("Id_stavke") %>'/>
                    </ItemTemplate>
                </asp:TemplateField>
                <asp:BoundField DataField="odgovor" HeaderText="odgovor"></asp:BoundField>
                <asp:BoundField DataField="broj_glasova" HeaderText="broj glasova"></asp:BoundField>
            </Columns>
        </asp:GridView>

        <br />
        <asp:LinkButton ID="LinkButtonInsertStavke" runat="server" OnClick="LinkButtonInsertStavke_Click">add new answer to surver? </asp:LinkButton>
        <br />

    </div>

    <div id="divInsertUpdateStavki" runat="server">

        <table style="width: 100%;">
            <tr>
                <td>answer</td>
                <td>
                    <asp:TextBox ID="TextBoxNazivStavke" runat="server"></asp:TextBox>
                </td>
                <td>&nbsp;</td>
            </tr>
            <tr id="redKojiSeKrije" runat="server">
                <td>number of votes</td>
                <td>
                    <asp:TextBox ID="TextBoxBrojGlasova" runat="server"></asp:TextBox>
                </td>
                <td>&nbsp;</td>
            </tr>
            <tr>
                <td>
                    <asp:HiddenField ID="HiddenFieldIdAnkete" runat="server" />
                    <asp:HiddenField ID="HiddenFieldIdStavke" runat="server" />
                </td>
                <td>
                    <asp:Button ID="ButtonUnosStavki" runat="server" OnClick="ButtonUnosStavki_Click" Text="Unesi"/>
                </td>
                <td>&nbsp;</td>
            </tr>
        </table>
    </div>

    <div id="divUdateAnketa" runat="server">
        <table style="width: 100%;">
            <tr>
                <td>Name of survey?</td>
                <td>
                    <asp:TextBox ID="TextBoxNazivAnkete" runat="server"></asp:TextBox>
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <asp:Button ID="ButtonUnosAnketa" runat="server" OnClick="ButtonUnosAnketa_Click" Text="Submit" />
                </td>
            </tr>
        </table>
    </div>
</asp:Content>
