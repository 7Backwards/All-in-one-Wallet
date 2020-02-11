package com.example.pint.Carteira;

import android.content.Context;
import android.content.SharedPreferences;
import android.net.Uri;
import android.os.Bundle;
import android.support.v4.app.Fragment;
import android.support.v7.widget.LinearLayoutManager;
import android.support.v7.widget.RecyclerView;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;

import com.android.volley.Request;
import com.android.volley.RequestQueue;
import com.android.volley.Response;
import com.android.volley.VolleyError;
import com.android.volley.toolbox.StringRequest;
import com.android.volley.toolbox.Volley;
import com.example.pint.Movimentos.RecyclerViewAdapter;
import com.example.pint.R;
import com.google.firebase.auth.FirebaseAuth;
import com.google.firebase.auth.FirebaseUser;

import org.json.JSONArray;
import org.json.JSONException;
import org.json.JSONObject;

import java.util.ArrayList;
import java.util.HashMap;
import java.util.List;
import java.util.Map;

public class MovsFragment extends Fragment {

    List<Movs> Movs;
    //id for post
    //private String id ="1";
    private String id="34";

    FirebaseUser user = FirebaseAuth.getInstance().getCurrentUser();
    //private String id =user.getUid();
    @Override
    public View onCreateView(LayoutInflater inflater, ViewGroup container,
                             Bundle savedInstanceState) {
        // Inflate the layout for this fragment
        postmovs();
        return inflater.inflate(R.layout.fragment_movs, container, false);

    }

    public void postmovs(){
        String url = "http://193.137.7.33/~estgv16064/PINT_Web/index.php/AndroidController/getTransacoes_Estabelecimento";
        StringRequest postReq = new StringRequest(Request.Method.POST, url,
                new Response.Listener<String>() {
                    @Override
                    public void onResponse(String response) {
                        try {
                            Movs = new ArrayList<>();

                            JSONObject obj = new JSONObject(response);
                            JSONArray array = obj.getJSONArray("transacoes");

                            for (int i = 0; i < array.length(); i++) {

                                Movs.add(new Movs(
                                        array.getJSONObject(i).getString("DATA_TRANSACAO"),
                                        array.getJSONObject(i).getString("VALOR_TRANSACAO"),
                                        array.getJSONObject(i).getString("PONTOS_GANHOS"),
                                        array.getJSONObject(i).getString("PONTOS_DESCONTADOS"),
                                        array.getJSONObject(i).getString("NOME_ESTABELECIMENTO")
                                ));
                            }
                            RecyclerView recyclerView = getActivity().findViewById(R.id.recycler_movs);
                            RecyclerViewAdapterMovs adapter = new RecyclerViewAdapterMovs(getActivity(), Movs);
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
        queue =(RequestQueue) Volley.newRequestQueue(getActivity());
        queue.add(postReq);

    }



}
