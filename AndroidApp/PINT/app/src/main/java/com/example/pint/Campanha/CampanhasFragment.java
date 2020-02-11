package com.example.pint.Campanha;

import android.graphics.drawable.AnimationDrawable;
import android.os.Bundle;
import android.support.annotation.NonNull;
import android.support.annotation.Nullable;
import android.support.v4.app.Fragment;
import android.support.v7.widget.GridLayoutManager;
import android.support.v7.widget.LinearLayoutManager;
import android.support.v7.widget.RecyclerView;
import android.text.Editable;
import android.text.TextWatcher;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.ArrayAdapter;
import android.widget.EditText;
import android.widget.RelativeLayout;
import android.widget.TextView;
import android.widget.Toast;

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
import java.util.HashMap;
import java.util.Map;

public class CampanhasFragment extends Fragment {


    //VARS VOLLEY
    private String NOME_CAMPANHA;
    private String NOME_ESTABELECIMENTO;
    private String FILENAME_LOGOTIPO_CAMPANHA;
    private String ID_ESTABELECIMENTO;

    //vars list

    public ArrayList<String> mNOME_CAMPANHA = new ArrayList<>();
    public ArrayList<String> mID_CARTAO = new ArrayList<>();
    public ArrayList<String> mID_ESTABELECIMENTO = new ArrayList<>();
    public ArrayList<String> mNOME_ESTABELECIMENTO = new ArrayList<>();
    public ArrayList<String> mFILENAME_LOGOTIPO_CAMPANHA = new ArrayList<>();
    public ArrayList<String> mImageUrls = new ArrayList<>();


    FirebaseUser user = FirebaseAuth.getInstance().getCurrentUser();
    private String id =user.getUid();
    //id for post
    //private String id ="1";

    String url_c="http://193.137.7.33/~estgv16064/PINT_Web/LogotipoCampanhas/";

    //filter...
    EditText thefilter;

    @Nullable
    @Override
    public View onCreateView(@NonNull LayoutInflater inflater, @Nullable ViewGroup container, @Nullable Bundle savedInstanceState) {
               View v=  inflater.inflate(R.layout.fragment_campanhas,container,false);

       post();


            return v;
        }



        private void post(){



            String url = "http://193.137.7.33/~estgv16064/PINT_Web/index.php/AndroidController/getallcampanhas_mobile";
            StringRequest postReq = new StringRequest(Request.Method.POST, url,
                    new Response.Listener<String>() {
                        @Override
                        public void onResponse(String response) {
                            //Toast.makeText(getActivity(),response,Toast.LENGTH_SHORT).show();
                            try {

                                JSONObject obj = new JSONObject(response);

                                JSONArray array = obj.getJSONArray("campanhas");

                                for (int i = 0; i < array.length(); i++) {

                                    ID_ESTABELECIMENTO= array.getJSONObject(i).getString("ID_ESTABELECIMENTO");
                                    NOME_CAMPANHA= array.getJSONObject(i).getString("NOME_CAMPANHA");
                                    //ID_CARTAO= array.getJSONObject(i).getString("ID_CARTAO");
                                    NOME_ESTABELECIMENTO= array.getJSONObject(i).getString("NOME_ESTABELECIMENTO");
                                    FILENAME_LOGOTIPO_CAMPANHA=url_c+array.getJSONObject(i).getString("FILENAME_LOGOTIPO_CAMPANHA");
                                    mImageUrls.add("https://i.redd.it/0h2gm1ix6p501.jpg");

                                    //Toast.makeText(getActivity(),NOME_CAMPANHA,Toast.LENGTH_SHORT).show();

                                    mFILENAME_LOGOTIPO_CAMPANHA.add(FILENAME_LOGOTIPO_CAMPANHA);
                                    mID_ESTABELECIMENTO.add(ID_ESTABELECIMENTO);
                                    mNOME_CAMPANHA.add(NOME_CAMPANHA);
                                    mNOME_ESTABELECIMENTO.add(NOME_ESTABELECIMENTO);
                                    //mID_CARTAO.add(ID_CARTAO);
                                }
                                RecyclerView recyclerView = getActivity().findViewById(R.id.recycler_view_campanhas);
                                RecyclerViewAdapterCamp adaptercamp = new RecyclerViewAdapterCamp(getActivity(), mImageUrls,mNOME_CAMPANHA,mNOME_ESTABELECIMENTO/*,mID_CARTAO*/,mID_ESTABELECIMENTO,mFILENAME_LOGOTIPO_CAMPANHA);
                                recyclerView.setAdapter(adaptercamp);
                                //recyclerView.setLayoutManager(new LinearLayoutManager(getActivity()));
                                recyclerView.setLayoutManager(new GridLayoutManager(getActivity(), 2));
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
        }
}
