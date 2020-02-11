package com.example.pint.Campanha;

import android.content.Context;
import android.support.v7.widget.GridLayoutManager;
import android.support.v7.widget.RecyclerView;
import android.util.Log;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.Button;
import android.widget.ImageView;
import android.widget.RelativeLayout;
import android.widget.TextView;
import android.widget.Toast;

import com.android.volley.Request;
import com.android.volley.RequestQueue;
import com.android.volley.Response;
import com.android.volley.VolleyError;
import com.android.volley.toolbox.StringRequest;
import com.android.volley.toolbox.Volley;
import com.bumptech.glide.Glide;
import com.example.pint.R;
import com.google.firebase.auth.FirebaseAuth;
import com.google.firebase.auth.FirebaseUser;
import com.squareup.picasso.Picasso;

import org.json.JSONArray;
import org.json.JSONException;
import org.json.JSONObject;

import java.util.ArrayList;
import java.util.HashMap;
import java.util.Map;

import de.hdodenhof.circleimageview.CircleImageView;


public class RecyclerViewAdapterCamp extends RecyclerView.Adapter<RecyclerViewAdapterCamp.ViewHolder>{

    //id..
    //private String id ="1";

    FirebaseUser user = FirebaseAuth.getInstance().getCurrentUser();
    private String id =user.getUid();

    private static final String TAG = "RecyclerViewAdapterCamp";

    private ArrayList<String> mNames;
    private ArrayList<String> mImages;
    private ArrayList<String> mEstabelecimento;
    private ArrayList<String> mID;
    private ArrayList<String> mID_ESTABELECIMENTO;
    private ArrayList<String> mFILENAME_LOGOTIPO_CAMPANHA;
    private Context mContext;


    //vai buscar as variaveis por nos
    public RecyclerViewAdapterCamp(Context context, ArrayList<String> images,ArrayList<String> names,ArrayList<String> estabelecimento/*,ArrayList<String> ID*/,ArrayList<String> ID_ESTABELECIMENTO,ArrayList<String> imag) {
        mNames = names;
        mImages = images;
        mContext = context;
        mEstabelecimento = estabelecimento;
        mID_ESTABELECIMENTO=ID_ESTABELECIMENTO;
        mFILENAME_LOGOTIPO_CAMPANHA=imag;
        //mID = ID;
    }

    @Override
    public ViewHolder onCreateViewHolder(ViewGroup parent, int viewType) {
        View view = LayoutInflater.from(parent.getContext()).inflate(R.layout.layout_listitemcampanha, parent, false);
        ViewHolder holder = new ViewHolder(view);
        return holder;
    }

    @Override
    public void onBindViewHolder(ViewHolder holder, final int position) {
        Log.d(TAG, "onBindViewHolder: called.");

        Glide.with(mContext)
                .asBitmap()
                .load(mImages.get(position));
//                .into(holder.image);

        holder.f_nome_campanha.setText(mNames.get(position));
        holder.f_estabelecimento.setText(mEstabelecimento.get(position));
        Picasso.with(mContext).load(mFILENAME_LOGOTIPO_CAMPANHA.get(position)).into(holder.image);
        holder.button.setOnClickListener(new View.OnClickListener() {
            public void onClick(View v) {
                Toast.makeText(mContext, "Feito!", Toast.LENGTH_SHORT).show();
                //Toast.makeText(mContext,mID_ESTABELECIMENTO.get(position),Toast.LENGTH_SHORT).show();
                postcard(/*mID.get(position),*/mID_ESTABELECIMENTO.get(position));
            }
        });
        holder.parent_layout3.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                //Log.d(TAG, "onClick: clicked on: " + mImageNames.get(position));

                Toast.makeText(mContext, mNames.get(position), Toast.LENGTH_SHORT).show();

            }
        });
    }

    @Override
    public int getItemCount() {
        return mImages.size();
    }

    //Recicla as views....
    public class ViewHolder extends RecyclerView.ViewHolder{

        Button button;
        //CircleImageView image;
        TextView f_nome_campanha;
        TextView f_estabelecimento;
        RelativeLayout parent_layout3;
        ImageView image;
        //RelativeLayout parentLayout;

        public ViewHolder(View itemView) {
            super(itemView);
            f_nome_campanha = itemView.findViewById(R.id.f_nome_campanha);
            button = (Button) itemView.findViewById(R.id.btn_add_card);
            f_estabelecimento = itemView.findViewById(R.id.f_estabelecimento);
            image = itemView.findViewById(R.id.image);
            parent_layout3 = itemView.findViewById(R.id.parent_layout3);
        }
    }



    public  void postcard(/*final String ID,*/final String ID_ESTABELECIMENTO){
        String url = "http://193.137.7.33/~estgv16064/PINT_Web/index.php/AndroidController/insert_cartoes_mob";
        StringRequest postReq = new StringRequest(Request.Method.POST, url,
                new Response.Listener<String>() {
                    @Override
                    public void onResponse(String response) {
                        //Toast.makeText(getActivity(),response,Toast.LENGTH_SHORT).show();
                        try {



                            JSONObject obj = new JSONObject(response);

                            JSONArray array = obj.getJSONArray("campanhas");

                            for (int i = 0; i < array.length(); i++) {
/*
                             //...
  */
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
                params.put("id",id);
                //params.put("id_cartao",ID);
                params.put("id_estabelecimento",ID_ESTABELECIMENTO);
                return params;
            }
        };
        RequestQueue queue;
        queue =(RequestQueue) Volley.newRequestQueue(mContext);
        queue.add(postReq);
    }
}