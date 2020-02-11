package com.example.pint.Carteira;

import android.animation.ArgbEvaluator;
import android.content.Context;
import android.content.Intent;
import android.content.SharedPreferences;
import android.os.Bundle;
import android.support.annotation.NonNull;
import android.support.annotation.Nullable;
import android.support.design.widget.FloatingActionButton;
import android.support.v4.app.Fragment;
import android.support.v4.view.ViewPager;
import android.support.v7.widget.GridLayoutManager;
import android.support.v7.widget.LinearLayoutManager;
import android.support.v7.widget.RecyclerView;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.Button;
import android.widget.ProgressBar;
import android.widget.TextView;
import android.widget.Toast;

import com.android.volley.Request;
import com.android.volley.RequestQueue;
import com.android.volley.Response;
import com.android.volley.VolleyError;
import com.android.volley.toolbox.StringRequest;
import com.android.volley.toolbox.Volley;
import com.example.pint.Campanha.RecyclerViewAdapterCamp;
import com.example.pint.Movimentos.RecyclerViewAdapter;
import com.example.pint.R;
import com.google.firebase.auth.FirebaseAuth;
import com.google.firebase.auth.FirebaseUser;
import com.google.zxing.integration.android.IntentIntegrator;
import com.google.zxing.integration.android.IntentResult;

import org.json.JSONArray;
import org.json.JSONException;
import org.json.JSONObject;

import java.util.ArrayList;
import java.util.HashMap;
import java.util.List;
import java.util.Map;

import static java.lang.String.valueOf;

public class CarteiraFragment extends Fragment {



    String send;//para o scan
    ViewPager viewPager;
    Adapter adapter;
    List<Model> models;
    Integer[] colors = null;
    ArgbEvaluator argbEvaluator = new ArgbEvaluator();
    String ur1_1="http://193.137.7.33/~estgv16064/PINT_Web/LogotipoEstabelecimento/";
    String url_2;
    int number=0;
    int i;



    private IntentIntegrator qrScan;


    //id for post
    //private String id ="1";

    FirebaseUser user = FirebaseAuth.getInstance().getCurrentUser();
    private String id =user.getUid();

    @Nullable
    @Override
    public View onCreateView(@NonNull LayoutInflater inflater, @Nullable ViewGroup container, @Nullable Bundle savedInstanceState) {
        View v  = inflater.inflate(R.layout.fragment_carteira,container,false);




        ProgressBar progressBar = v.findViewById(R.id.progress_bar);
        progressBar.setVisibility(View.VISIBLE);

        qrScan = new IntentIntegrator(getActivity());

            String url = "http://193.137.7.33/~estgv16064/PINT_Web/index.php/AndroidController/get_cartoes_informacao";
            StringRequest postReq = new StringRequest(Request.Method.POST, url,
                    new Response.Listener<String>() {
                        @Override
                        public void onResponse(String response) {
                            models = new ArrayList<>();

                            //Toast.makeText(getActivity(),response,Toast.LENGTH_SHORT).show();
                            try {

                                JSONObject obj = new JSONObject(response);

                                JSONArray array = obj.getJSONArray("cartoes");

                                for (i = 0; i < array.length(); i++) {

                                    models.add(new Model(ur1_1+array.getJSONObject(i).getString("FILENAME_LOGOTIPO"), array.getJSONObject(i).getString("NOME_ESTABELECIMENTO"), array.getJSONObject(i).getString("DESCRICAO_ESTABELECIMENTO"),array.getJSONObject(i).getString("ID_ESTABELECIMENTO"),array.getJSONObject(i).getString("ID_CARTAO")));
                                }
                                TextView numbercards;
                                String cards="";
                                String go= i + cards;
                                numbercards = getActivity().findViewById(R.id.numbercards);
                                numbercards.setText(go);
                                adapter = new Adapter(models, getActivity());

                                viewPager = getActivity().findViewById(R.id.viewPager);
                                viewPager.setAdapter(adapter);
                                viewPager.setPadding(130, 0, 130, 0);

                                Integer[] colors_temp = {
                                        getResources().getColor(R.color.f2f5f8),
                                        getResources().getColor(R.color.com_facebook_blue),
                                        getResources().getColor(R.color.f2f5f8),
                                        getResources().getColor(R.color.com_facebook_blue),
                                };

                                colors = colors_temp;

                                viewPager.setOnPageChangeListener(new ViewPager.OnPageChangeListener() {
                                    @Override
                                    public void onPageScrolled(int position, float positionOffset, int positionOffsetPixels) {

                                        if (position < (adapter.getCount() -1) && position < (colors.length - 1)) {
                                            viewPager.setBackgroundColor(

                                                    (Integer) argbEvaluator.evaluate(
                                                            positionOffset,
                                                            colors[position],
                                                            colors[position + 1]
                                                    )
                                            );
                                        }

                                        else {
                                            viewPager.setBackgroundColor(colors[colors.length - 1]);
                                        }
                                    }

                                    @Override
                                    public void onPageSelected(int position) {
                                        //...
                                    }

                                    @Override
                                    public void onPageScrollStateChanged(int state) {

                                    }
                                });

//...

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
                    params.put("id",id);
                    return params;
                }
            };
            RequestQueue queue;
            queue =(RequestQueue) Volley.newRequestQueue(getActivity());
            queue.add(postReq);


        //Swiper

//scan
        FloatingActionButton floatingActionButton =v.findViewById(R.id.fab);

        floatingActionButton.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                scanQRCode(v);
            }
        });





        //Swiper





        progressBar.setVisibility(View.GONE);

        return v;
    }


    public void scanQRCode(View view){
        qrScan.initiateScan();
    }

    @Override
    public void onActivityResult(int requestCode, int resultCode, Intent data) {
        IntentResult result= IntentIntegrator.parseActivityResult(requestCode,resultCode,data);
        if(result !=null){
            if (result.getContents()==null){
                Toast.makeText(getContext(),"Não encontrado",Toast.LENGTH_SHORT).show();
            } else{
                try{
                    JSONObject object = new JSONObject(result.getContents());


                    JSONArray array = object.getJSONArray("send");

                    for (int i = 0; i < array.length(); i++) {
                        send= array.getJSONObject(i).getString("ID_ESTABELECIMENTO");
                    }
                    //post

                }catch (JSONException e){
                    e.printStackTrace();
                    Toast.makeText(getContext(),result.getContents(),Toast.LENGTH_SHORT).show();
                }
            }
        } else {
            super.onActivityResult(requestCode,resultCode,data);
        }
    }



    public  void scanpost(){
        String url = "http://193.137.7.33/~estgv16064/PINT_Web/index.php/AndroidController/fidelizarCliente_mobile";
        StringRequest postReq = new StringRequest(Request.Method.POST, url,
                new Response.Listener<String>() {
                    @Override
                    public void onResponse(String response) {
                        try {

                            JSONObject obj = new JSONObject(response);
                            JSONArray array = obj.getJSONArray("transacoes");

                            for (int i = 0; i < array.length(); i++) {

                            }


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
                params.put("id",/*user.getUid()*/id);
                params.put("id_estabelecimento",send);
                return params;
            }
        };
        RequestQueue queue;
        queue =(RequestQueue)Volley.newRequestQueue(getActivity());
        queue.add(postReq);

    }

}
