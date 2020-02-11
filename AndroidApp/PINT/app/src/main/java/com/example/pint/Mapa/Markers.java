package com.example.pint.Mapa;

public class Markers {
    private Double lat,lon;
    private String name;
    public Markers(Double lat,Double lon,String name){
        this.lat=lat;
        this.lon=lon;
        this.name=name;
    }

    public Double getLat() {
        return lat;
    }

    public void setLat(Double lat) {
        this.lat = lat;
    }

    public Double getLon() {
        return lon;
    }

    public void setLon(Double lon) {
        this.lon = lon;
    }

    public String getName() {
        return name;
    }

    public void setName(String name) {
        this.name = name;
    }
}
