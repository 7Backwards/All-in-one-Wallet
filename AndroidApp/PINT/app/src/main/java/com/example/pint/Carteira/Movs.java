package com.example.pint.Carteira;

public class Movs {
    private String DATA_TRANSACAO;
    private String VALOR_TRANSACAO;
    private String PONTOS_GANHOS;
    private String PONTOS_DESCONTADOS;
    private String ESTABELECIMENTO_NOME;

    public String getDATA_TRANSACAO() {
        return DATA_TRANSACAO;
    }

    public void setDATA_TRANSACAO(String DATA_TRANSACAO) {
        this.DATA_TRANSACAO = DATA_TRANSACAO;
    }

    public String getVALOR_TRANSACAO() {
        return VALOR_TRANSACAO;
    }

    public void setVALOR_TRANSACAO(String VALOR_TRANSACAO) {
        this.VALOR_TRANSACAO = VALOR_TRANSACAO;
    }

    public String getPONTOS_GANHOS() {
        return PONTOS_GANHOS;
    }

    public void setPONTOS_GANHOS(String PONTOS_GANHOS) {
        this.PONTOS_GANHOS = PONTOS_GANHOS;
    }

    public String getPONTOS_DESCONTADOS() {
        return PONTOS_DESCONTADOS;
    }

    public void setPONTOS_DESCONTADOS(String PONTOS_DESCONTADOS) {
        this.PONTOS_DESCONTADOS = PONTOS_DESCONTADOS;
    }

    public String getESTABELECIMENTO_NOME() {
        return ESTABELECIMENTO_NOME;
    }

    public void setESTABELECIMENTO_NOME(String ESTABELECIMENTO_NOME) {
        this.ESTABELECIMENTO_NOME = ESTABELECIMENTO_NOME;
    }

    public Movs(String DATA_TRANSACAO, String VALOR_TRANSACAO, String PONTOS_GANHOS, String PONTOS_DESCONTADOS, String ESTABELECIMENTO_NOME){
        this.DATA_TRANSACAO=DATA_TRANSACAO;
        this.VALOR_TRANSACAO=VALOR_TRANSACAO;
        this.PONTOS_GANHOS=PONTOS_GANHOS;
        this.PONTOS_DESCONTADOS=PONTOS_DESCONTADOS;
        this.ESTABELECIMENTO_NOME=ESTABELECIMENTO_NOME;


    }
}
