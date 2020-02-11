package com.example.pint.Perfil;

public class Client {
    private String NOTIFICACAO_EMAIL;
    private String NOTIFICACAO_APP;

    public Client(String NOTIFICACAO_EMAIL, String NOTIFICACAO_APP) {
        this.NOTIFICACAO_EMAIL = NOTIFICACAO_EMAIL;
        this.NOTIFICACAO_APP = NOTIFICACAO_APP;
    }

    public String getNOTIFICACAO_EMAIL() {
        return NOTIFICACAO_EMAIL;
    }

    public void setNOTIFICACAO_EMAIL(String NOTIFICACAO_EMAIL) {
        this.NOTIFICACAO_EMAIL = NOTIFICACAO_EMAIL;
    }

    public String getNOTIFICACAO_APP() {
        return NOTIFICACAO_APP;
    }

    public void setNOTIFICACAO_APP(String NOTIFICACAO_APP) {
        this.NOTIFICACAO_APP = NOTIFICACAO_APP;
    }
}
