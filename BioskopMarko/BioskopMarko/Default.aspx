<%@ Page Title="" Language="C#" MasterPageFile="~/MarkoMaster.Master" AutoEventWireup="true" CodeBehind="Default.aspx.cs" Inherits="BioskopMarko.Default" %>
<asp:Content ID="Content1" ContentPlaceHolderID="head" runat="server">
    
</asp:Content>
<asp:Content ID="Content2" ContentPlaceHolderID="ContentPlaceHolderLevo" runat="server">
    
        <h2>Najbolje ocenjeni filmovi</h2>
        <div class="poOceni col-md-12 col-md-offset-0 col-lg-12 col-lg-offset-0">
            
            <asp:ListView ID="sortiranoPoOceni" runat="server">
                <ItemTemplate>
                    <div class="prikazStavkeFilma">
                        <img src='<%# Eval("PutanjaDoSlike") %>' class="img-responsive"/>
                        <h4><%# Eval("NazivFilma") %></h4>
                        <h5>Ocena : <%# Eval("Ocena") %></h5>
                    </div>
                </ItemTemplate>
            </asp:ListView>
        </div>
    
</asp:Content>
