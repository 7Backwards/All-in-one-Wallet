package com.example.pint.Movimentos;
import android.content.Context;
import android.content.SharedPreferences;
import android.graphics.drawable.AnimationDrawable;
import android.os.Bundle;
import android.support.annotation.NonNull;
import android.support.annotation.Nullable;
import android.support.v4.app.Fragment;
import android.support.v7.app.AppCompatActivity;
import android.support.v7.widget.Toolbar;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.RelativeLayout;

import com.android.volley.Request;
import com.android.volley.RequestQueue;
import com.android.volley.Response;
import com.android.volley.VolleyError;
import com.android.volley.toolbox.StringRequest;
import com.android.volley.toolbox.Volley;
import com.example.pint.R;
import com.google.firebase.auth.FirebaseAuth;
import com.google.firebase.auth.FirebaseUser;

import org.json.JSONArray;
import org.json.JSONException;
import org.json.JSONObject;

import java.util.ArrayList;

import android.support.v7.widget.LinearLayoutManager;
import android.support.v7.widget.RecyclerView;

import java.util.HashMap;
import java.util.Map;

public class MovimentosFragment extends Fragment {

    //SHARED PREF
    public static final String SHARED_PREFS= "sharedPrefs";
    public static final String TEXT= "text";


    //VARS VOLLEY
    private String DATA_TRANSACAO;
    private String VALOR_TRANSACAO;
    private String PONTOS_GANHOS;
    private String PONTOS_DESCONTADOS;
    private String ESTABELECIMENTO_NOME;

    //vars list
    public ArrayList<String> mEstabelecimentos = new ArrayList<>();
    public ArrayList<String> mNames = new ArrayList<>();
    public ArrayList<String> mValor = new ArrayList<>();
    public ArrayList<String> mGanhos = new ArrayList<>();
    public ArrayList<String> mDescontados = new ArrayList<>();
    public ArrayList<String> mImageUrls = new ArrayList<>();


    //id for post
    //private String id ="1";


    FirebaseUser user = FirebaseAuth.getInstance().getCurrentUser();
    private String id =user.getUid();

    @Nullable
    @Override
    public View onCreateView(@NonNull LayoutInflater inflater, @Nullable ViewGroup container, @Nullable Bundle savedInstanceState) {
        final View v = inflater.inflate(R.layout.fragment_movimentos, container, false);
        Toolbar toolbar = v.findViewById(R.id.toolbar);
        ((AppCompatActivity) getActivity()).setSupportActionBar(toolbar);


        RelativeLayout relativeLayout = v.findViewById(R.id.id_movi);
        AnimationDrawable animationDrawable = (AnimationDrawable) relativeLayout.getBackground();
        animationDrawable.setEnterFadeDuration(2000);
        animationDrawable.setExitFadeDuration(4000);
        animationDrawable.start();

        post();

        return v;
    }

    public  void post(){
        String url = "http://193.137.7.33/~estgv16064/PINT_Web/index.php/AndroidController/gettransacoes_mobile";
        StringRequest postReq = new StringRequest(Request.Method.POST, url,
                new Response.Listener<String>() {
                    @Override
                    public void onResponse(String response) {
                        try {

                            JSONObject obj = new JSONObject(response);
                            JSONArray array = obj.getJSONArray("transacoes");

                            SharedPreferences sharedPreferences = getContext().getSharedPreferences(SHARED_PREFS, Context.MODE_PRIVATE);
                            SharedPreferences.Editor editor = sharedPreferences.edit();

                            for (int i = 0; i < array.length(); i++) {


                                DATA_TRANSACAO = array.getJSONObject(i).getString("DATA_TRANSACAO");
                                VALOR_TRANSACAO = array.getJSONObject(i).getString("VALOR_TRANSACAO");
                                PONTOS_GANHOS = array.getJSONObject(i).getString("PONTOS_GANHOS");
                                PONTOS_DESCONTADOS = array.getJSONObject(i).getString("PONTOS_DESCONTADOS");
                                ESTABELECIMENTO_NOME = array.getJSONObject(i).getString("NOME_ESTABELECIMENTO");

                                PONTOS_GANHOS= "+" + PONTOS_GANHOS;
                                if(!PONTOS_DESCONTADOS.equals("0")) {
                                    PONTOS_DESCONTADOS= "-" + PONTOS_DESCONTADOS;
                                }
                                VALOR_TRANSACAO =  VALOR_TRANSACAO + "€";

                                mImageUrls.add("https://i.redd.it/0h2gm1ix6p501.jpg");
                                mNames.add(DATA_TRANSACAO);
                                mValor.add(VALOR_TRANSACAO);
                                mGanhos.add(PONTOS_GANHOS);
                                mDescontados.add(PONTOS_DESCONTADOS);
                                mEstabelecimentos.add(ESTABELECIMENTO_NOME);

                                editor.putString(TEXT, array.getJSONObject(i).getString("NOME_ESTABELECIMENTO"));
                                editor.apply();





                            }

                            RecyclerView recyclerView = getActivity().findViewById(R.id.recycler_view);
                            RecyclerViewAdapter adapter = new RecyclerViewAdapter(getActivity(), mNames, mImageUrls,mValor,mGanhos,mDescontados,mEstabelecimentos);
                            recyclerView.setAdapter(adapter);
                            recyclerView.setLayoutManager(new LinearLayoutManager(getActivity()));
                        } catch (JSONException e) {
                            e.printStackTrace();
                        }
                    }
                },
                new Response.ErrorListener() {
                    @Override
                    public void onErrorResponse(VolleyError error) {
                        error.printStackTrace();
                    }
                }) {
            @Override
            protected Map<String, String> getParams() {
                Map<String, String> params = new HashMap<>();
                //para mandar para o server
                params.put("id",id);
                return params;

            }
        };
        RequestQueue queue;
        queue =(RequestQueue)Volley.newRequestQueue(getActivity());
        queue.add(postReq);

    }




}

