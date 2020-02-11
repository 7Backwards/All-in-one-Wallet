package com.example.pint.Carteira;

public class Model {
    private String image;
    private String title;
    private String desc;
    private String id_estab;
    private int number;
    private String id_card;

    public Model(String image, String title, String desc,String id_estab,String id_card) {
        this.image = image;
        this.title = title;
        this.desc = desc;
        this.id_estab = id_estab;
        this.number=number;
        this.id_card=id_card;
    }


    public String getImage() {
        return image;
    }

    public void setImage(String image) {
        this.image = image;
    }

    public String getTitle() {
        return title;
    }

    public void setTitle(String title) {
        this.title = title;
    }

    public String getDesc() {
        return desc;
    }

    public void setDesc(String desc) {
        this.desc = desc;
    }

    public String getId_estab() {
        return id_estab;
    }

    public void setId_estab(String id_estab) {
        this.id_estab = id_estab;
    }

    public int getNumber() {
        return number;
    }

    public void setNumber(int number) {
        this.number = number;
    }

    public String getId_card() {
        return id_card;
    }

    public void setId_card(String id_card) {
        this.id_card = id_card;
    }
}
