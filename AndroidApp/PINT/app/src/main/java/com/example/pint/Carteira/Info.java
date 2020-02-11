package com.example.pint.Carteira;

public class Info {
    private String PONTOS_CARTAO;
    private String NOTIFICACAO_ESTABELECIMENTO;
    private String date_creation;
    private String NOME_ESTABELECIMENTO;
    private String CIDADE_ESTABELECIMENTO;
    private String MORADA_ESTABELECIMENTO;
    private String DESCRICAO_ESTABELECIMENTO;
    private String ganhar_pontos;
    private String usar_pontos;
    private String id_card;

    public Info(String PONTOS_CARTAO, String NOTIFICACAO_ESTABELECIMENTO, String date_creation,String NOME_ESTABELECIMENTO,String CIDADE_ESTABELECIMENTO,String MORADA_ESTABELECIMENTO,String DESCRICAO_ESTABELECIMENTO,String ganhar_pontos,String usar_pontos, String id_card) {
        this.PONTOS_CARTAO =PONTOS_CARTAO ;
        this.NOTIFICACAO_ESTABELECIMENTO=NOTIFICACAO_ESTABELECIMENTO;
        this.date_creation=date_creation;
        this.NOME_ESTABELECIMENTO=NOME_ESTABELECIMENTO;
        this.CIDADE_ESTABELECIMENTO=CIDADE_ESTABELECIMENTO;
        this.MORADA_ESTABELECIMENTO=MORADA_ESTABELECIMENTO;
        this.DESCRICAO_ESTABELECIMENTO=DESCRICAO_ESTABELECIMENTO;
        this.ganhar_pontos=ganhar_pontos;
        this.usar_pontos=usar_pontos;
        this.id_card=id_card;
    }


    public String getPONTOS_CARTAO() {
        return PONTOS_CARTAO;
    }

    public void setPONTOS_CARTAO(String PONTOS_CARTAO) {
        this.PONTOS_CARTAO = PONTOS_CARTAO;
    }

    public String getNOTIFICACAO_ESTABELECIMENTO() {
        return NOTIFICACAO_ESTABELECIMENTO;
    }

    public void setNOTIFICACAO_ESTABELECIMENTO(String NOTIFICACAO_ESTABELECIMENTO) {
        this.NOTIFICACAO_ESTABELECIMENTO = NOTIFICACAO_ESTABELECIMENTO;
    }

    public String getDate_creation() {
        return date_creation;
    }

    public void setDate_creation(String date_creation) {
        this.date_creation = date_creation;
    }

    public String getNOME_ESTABELECIMENTO() {
        return NOME_ESTABELECIMENTO;
    }

    public void setNOME_ESTABELECIMENTO(String NOME_ESTABELECIMENTO) {
        this.NOME_ESTABELECIMENTO = NOME_ESTABELECIMENTO;
    }

    public String getCIDADE_ESTABELECIMENTO() {
        return CIDADE_ESTABELECIMENTO;
    }

    public void setCIDADE_ESTABELECIMENTO(String CIDADE_ESTABELECIMENTO) {
        this.CIDADE_ESTABELECIMENTO = CIDADE_ESTABELECIMENTO;
    }

    public String getMORADA_ESTABELECIMENTO() {
        return MORADA_ESTABELECIMENTO;
    }

    public void setMORADA_ESTABELECIMENTO(String MORADA_ESTABELECIMENTO) {
        this.MORADA_ESTABELECIMENTO = MORADA_ESTABELECIMENTO;
    }

    public String getDESCRICAO_ESTABELECIMENTO() {
        return DESCRICAO_ESTABELECIMENTO;
    }

    public void setDESCRICAO_ESTABELECIMENTO(String DESCRICAO_ESTABELECIMENTO) {
        this.DESCRICAO_ESTABELECIMENTO = DESCRICAO_ESTABELECIMENTO;
    }

    public String getGanhar_pontos() {
        return ganhar_pontos;
    }

    public void setGanhar_pontos(String ganhar_pontos) {
        this.ganhar_pontos = ganhar_pontos;
    }

    public String getUsar_pontos() {
        return usar_pontos;
    }

    public void setUsar_pontos(String usar_pontos) {
        this.usar_pontos = usar_pontos;
    }

    public String getId_card() {
        return id_card;
    }

    public void setId_card(String id_card) {
        this.id_card = id_card;
    }
}
