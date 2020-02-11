package com.example.pint.Carteira;

import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;

import java.util.List;


import android.animation.ArgbEvaluator;
import android.support.v4.view.ViewPager;
import android.widget.TextView;

import com.android.volley.Request;
import com.android.volley.RequestQueue;
import com.android.volley.Response;
import com.android.volley.VolleyError;
import com.android.volley.toolbox.StringRequest;
import com.android.volley.toolbox.Volley;
import com.example.pint.R;
import com.google.zxing.integration.android.IntentIntegrator;

import org.json.JSONArray;
import org.json.JSONException;
import org.json.JSONObject;

import java.util.ArrayList;
import java.util.HashMap;
import java.util.List;
import java.util.Map;
public class MovsActivity extends AppCompatActivity {
    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_movs);
        getSupportFragmentManager().beginTransaction().replace(R.id.fragment_container_movs, new MovsFragment()).commit();
    }

}

