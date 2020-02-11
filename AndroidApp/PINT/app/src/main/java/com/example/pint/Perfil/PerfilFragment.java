package com.example.pint.Perfil;

import android.content.Intent;
import android.graphics.drawable.AnimationDrawable;
import android.os.Bundle;
import android.support.annotation.NonNull;
import android.support.annotation.Nullable;
import android.support.design.widget.CoordinatorLayout;
import android.support.v4.app.Fragment;
import android.support.v7.app.AppCompatActivity;
import android.support.v7.widget.LinearLayoutManager;
import android.support.v7.widget.RecyclerView;
import android.support.v7.widget.SwitchCompat;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.support.v7.widget.Toolbar;

import com.android.volley.Request;
import com.android.volley.RequestQueue;
import com.android.volley.Response;
import com.android.volley.VolleyError;
import com.android.volley.toolbox.StringRequest;
import com.android.volley.toolbox.Volley;
import com.example.pint.Carteira.DeleteDialog;
import com.example.pint.Carteira.Model;
import com.example.pint.Movimentos.RecyclerViewAdapter;
import com.example.pint.R;
import com.example.pint.other.MainActivity;
import com.google.firebase.auth.FirebaseAuth;
import com.google.firebase.auth.FirebaseUser;

import android.widget.Button;
import android.widget.CompoundButton;
import android.widget.Switch;
import android.widget.TextView;
import android.widget.Toast;

import org.json.JSONArray;
import org.json.JSONException;
import org.json.JSONObject;

import java.util.ArrayList;
import java.util.HashMap;
import java.util.List;
import java.util.Map;

public class PerfilFragment extends Fragment {

    //post
    List<Client> Client;
    //vars
    FirebaseUser user = FirebaseAuth.getInstance().getCurrentUser();

    //id AQUI O ID È DOIS PARA DAR DELETE DO USER 2, UMA VEZ QUE O 1 JA TEM INFO POPULADA
    //String id ="2";

    FirebaseUser usera = FirebaseAuth.getInstance().getCurrentUser();
    private String id =usera.getUid();


    @Nullable
    @Override
    public View onCreateView(@NonNull LayoutInflater inflater, @Nullable ViewGroup container, @Nullable Bundle savedInstanceState) {
        View v= inflater.inflate(R.layout.fragment_perfil,container,false);
        Toolbar toolbar = v.findViewById(R.id.toolbar);
        ((AppCompatActivity)getActivity()).setSupportActionBar(toolbar);
        CoordinatorLayout relativeLayout = v.findViewById(R.id.id_perfil);
        AnimationDrawable animationDrawable = (AnimationDrawable) relativeLayout.getBackground();
        animationDrawable.setEnterFadeDuration(2000);
        animationDrawable.setExitFadeDuration(4000);
        animationDrawable.start();



        TextView t = (TextView)v.findViewById(R.id.fire_mail);
        t.setCompoundDrawablesWithIntrinsicBounds(R.drawable.ic_mail_black_24dp, 0, 0, 0);
        t.setText(user.getEmail());


        TextView t2 = (TextView)v.findViewById(R.id.fire_name);
        t2.setCompoundDrawablesWithIntrinsicBounds(R.drawable.ic_face_black_24dp, 0, 0, 0);
        t2.setText(user.getDisplayName());


        TextView t3 = (TextView)v.findViewById(R.id.fire_phone);
        t3.setCompoundDrawablesWithIntrinsicBounds(R.drawable.ic_local_phone_black_24dp, 0, 0, 0);
        t3.setText(user.getPhoneNumber());

        user.getPhotoUrl();




        //----INITIAL POST FOR INFO

        String url = "http://193.137.7.33/~estgv16064/PINT_Web/index.php/AndroidController/getclientes_mobile";
        StringRequest postReq = new StringRequest(Request.Method.POST, url,
                new Response.Listener<String>() {
                    @Override
                    public void onResponse(String response) {
                        try {

                            Client = new ArrayList<>();

                            JSONObject obj = new JSONObject(response);
                            JSONArray array = obj.getJSONArray("clientes");

                            for (int i = 0; i < array.length(); i++) {
                                Client.add(new Client(array.getJSONObject(i).getString("NOTIFICACAO_EMAIL"),array.getJSONObject(i).getString("NOTIFICACAO_APP")));

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
                params.put("id",id);
                return params;

            }
        };
        RequestQueue queue;
        queue =(RequestQueue) Volley.newRequestQueue(getActivity());
        queue.add(postReq);

        //---------------------------

        //--------------switch email----

        SwitchCompat switch_email = v.findViewById(R.id.switch_email);

        switch_email.setOnCheckedChangeListener(new CompoundButton.OnCheckedChangeListener() {
            public void onCheckedChanged(CompoundButton buttonView, boolean isChecked) {
                if (isChecked) {
                    Toast.makeText(getActivity(),"ON : Preferências atualizadas!",Toast.LENGTH_SHORT).show();
                    String perf ="1";
                    post_switch_email(id,perf);
                } else {

                    Toast.makeText(getActivity(),"OFF : Preferências atualizadas!",Toast.LENGTH_SHORT).show();
                    String perf ="0";
                    post_switch_email(id,perf);
                }
            }
        });
        //--------------------------

        //--------------switch app----
        SwitchCompat switch_app = v.findViewById(R.id.switch_app);

        /*
        if(Client.get(0).getNOTIFICACAO_APP().equals("1")){
            switch_app.setChecked(true);}
        switch_app.setOnCheckedChangeListener (null);
*/



        switch_app.setOnCheckedChangeListener(new CompoundButton.OnCheckedChangeListener() {
            public void onCheckedChanged(CompoundButton buttonView, boolean isChecked) {
                if (isChecked) {
                    Toast.makeText(getActivity(),"ON : Preferências atualizadas!",Toast.LENGTH_SHORT).show();
                    String perf ="1";
                    post_switch_app(id,perf);
                } else {
                    Toast.makeText(getActivity(),"OFF : Preferências atualizadas!",Toast.LENGTH_SHORT).show();
                    String perf ="0";
                    post_switch_app(id,perf);
                }
            }
        });
        //--------------------------




        //-----DELETE CARD BUTTON-------
        Button killuser = v.findViewById(R.id.killuser);
        killuser.setOnClickListener(new View.OnClickListener() {
            public void onClick(View v) {
                Bundle bundle = new Bundle();
                bundle.putString("param", id);

                DeleteUserDialog deleteUserDialog = new DeleteUserDialog();
                deleteUserDialog.setArguments(bundle);
                deleteUserDialog.show(getFragmentManager(),"delete");

            }
        });
        //------DELETE----------------
        //--------------SIGN OUT---------
        Button sair = v.findViewById(R.id.sair);
        sair.setOnClickListener(new View.OnClickListener() {
            public void onClick(View v) {
                FirebaseAuth.getInstance().signOut();
                Intent intent = new Intent(getContext(), MainActivity.class);
                startActivity(intent);

            }
        });


        //-----------------------------

















        return v;
    }



    public  void post_switch_email(final String id, final String param){

    String url = "http://193.137.7.33/~estgv16064/PINT_Web/index.php/AndroidController/updateNotificacoes_mobileMail";
    StringRequest postReq = new StringRequest(Request.Method.POST, url,
            new Response.Listener<String>() {
                @Override
                public void onResponse(String response) {
                    try {

                        //Client = new ArrayList<>();

                        JSONObject obj = new JSONObject(response);
                        JSONArray array = obj.getJSONArray("clientes");

                        for (int i = 0; i < array.length(); i++) {
                            //Client.add(new Client(array.getJSONObject(i).getString("NOTIFICACAO_EMAIL"),array.getJSONObject(i).getString("NOTIFICACAO_APP")));
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
            params.put("id",id);
            params.put("notMail",param);
            return params;

        }
    };
    RequestQueue queue;
    queue =(RequestQueue) Volley.newRequestQueue(getActivity());
    queue.add(postReq);

    //---------------------------
}



    public  void post_switch_app(final String id, final String param){

        String url = "http://193.137.7.33/~estgv16064/PINT_Web/index.php/AndroidController/updateNotificacoes_mobileApp";
        StringRequest postReq = new StringRequest(Request.Method.POST, url,
                new Response.Listener<String>() {
                    @Override
                    public void onResponse(String response) {
                        try {

                            //Client = new ArrayList<>();

                            JSONObject obj = new JSONObject(response);
                            JSONArray array = obj.getJSONArray("clientes");

                            for (int i = 0; i < array.length(); i++) {
                              //  Client.add(new Client(array.getJSONObject(i).getString("NOTIFICACAO_EMAIL"),array.getJSONObject(i).getString("NOTIFICACAO_APP")));
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
                params.put("id",id);
                params.put("notApp",param);
                return params;

            }
        };
        RequestQueue queue;
        queue =(RequestQueue) Volley.newRequestQueue(getActivity());
        queue.add(postReq);

        //---------------------------
    }



}