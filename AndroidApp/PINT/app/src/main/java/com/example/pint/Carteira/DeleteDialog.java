package com.example.pint.Carteira;

import android.app.AlertDialog;
import android.app.Dialog;
import android.content.DialogInterface;
import android.content.Intent;
import android.os.Bundle;
import android.support.v4.app.Fragment;
import android.support.v4.app.FragmentManager;
import android.support.v4.app.FragmentTransaction;
import android.support.v7.app.AppCompatDialogFragment;
import android.support.v7.widget.LinearLayoutManager;
import android.support.v7.widget.RecyclerView;
import android.widget.Toast;

import com.android.volley.Request;
import com.android.volley.RequestQueue;
import com.android.volley.Response;
import com.android.volley.VolleyError;
import com.android.volley.toolbox.StringRequest;
import com.android.volley.toolbox.Volley;
import com.example.pint.Movimentos.RecyclerViewAdapter;
import com.example.pint.R;
import com.example.pint.other.MainActivity;
import com.google.firebase.auth.FirebaseAuth;
import com.google.firebase.auth.FirebaseUser;

import org.json.JSONArray;
import org.json.JSONException;
import org.json.JSONObject;

import java.util.HashMap;
import java.util.Map;

public class DeleteDialog extends AppCompatDialogFragment {
    //id...
    //String id ="1";

    FirebaseUser user = FirebaseAuth.getInstance().getCurrentUser();
    private String id =user.getUid();
    @Override
    public Dialog onCreateDialog(Bundle savedInstanceState) {

        AlertDialog.Builder builder = new AlertDialog.Builder(getActivity());
        builder.setTitle("De certeza que quer eliminar?")
                .setMessage("Não pode voltar atrás com esta acção.")
                .setNegativeButton("Cancelar", new DialogInterface.OnClickListener() {
                    @Override
                    public void onClick(DialogInterface dialog, int which) {

                    }
                })
                .setPositiveButton("Eliminar", new DialogInterface.OnClickListener() {
                    @Override
                    public void onClick(DialogInterface dialog, int which) {
                        Bundle bundle = getArguments();
                        if (bundle != null) {
                            String param = bundle.getString("param");
                            Toast.makeText(getContext(),"Feito!",Toast.LENGTH_SHORT).show();
                            killpost(param);
                            Intent intent = new Intent(getContext(), MainActivity.class);
                            startActivity(intent);

                            //finish();
                            //System.exit(0);
                        }


                    }
                });


        return builder.create();
    }

    public  void killpost(final String param){
        String url = "http://193.137.7.33/~estgv16064/PINT_Web/index.php/AndroidController/DeleteCartao_mobile";
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
                params.put("id",id);
                params.put("id_estabelecimento",param);
                return params;

            }
        };
        RequestQueue queue;
        queue =(RequestQueue) Volley.newRequestQueue(getActivity());
        queue.add(postReq);


    }
}
