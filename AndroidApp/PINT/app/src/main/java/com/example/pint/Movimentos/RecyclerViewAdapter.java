package com.example.pint.Movimentos;

import android.content.Context;
import android.content.SharedPreferences;
import android.net.ConnectivityManager;
import android.net.NetworkInfo;
import android.support.v7.widget.RecyclerView;
import android.util.Log;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.RelativeLayout;
import android.widget.TextView;
import android.widget.Toast;

import com.bumptech.glide.Glide;
import com.example.pint.R;

import java.util.ArrayList;

import de.hdodenhof.circleimageview.CircleImageView;

import static com.example.pint.Movimentos.MovimentosFragment.SHARED_PREFS;
import static com.example.pint.Movimentos.MovimentosFragment.TEXT;


public class RecyclerViewAdapter extends RecyclerView.Adapter<RecyclerViewAdapter.ViewHolder>{

    private static final String TAG = "RecyclerViewAdapter";

    private ArrayList<String> mEstabelecimento = new ArrayList<>();
    private ArrayList<String> mImageNames = new ArrayList<>();
    private ArrayList<String> mImages = new ArrayList<>();
    private ArrayList<String> mValor = new ArrayList<>();
    private ArrayList<String> mGanhos = new ArrayList<>();
    private ArrayList<String> mDescontados = new ArrayList<>();
    private Context mContext;


    //vai buscar as variaveis por nos
    public RecyclerViewAdapter(Context context, ArrayList<String> imageNames, ArrayList<String> images, ArrayList<String> valor,ArrayList<String> Ganhos,ArrayList<String> Descontados,ArrayList<String> estabelecimento ) {
        mEstabelecimento = estabelecimento;
        mImageNames = imageNames;
        mImages = images;
        mContext = context;
        mValor = valor;
        mGanhos = Ganhos;
        mDescontados = Descontados;
    }

    @Override
    public ViewHolder onCreateViewHolder(ViewGroup parent, int viewType) {
        View view = LayoutInflater.from(parent.getContext()).inflate(R.layout.layout_listitem, parent, false);
        ViewHolder holder = new ViewHolder(view);
        return holder;
    }

    @Override
    public void onBindViewHolder(ViewHolder holder, final int position) {
        Log.d(TAG, "onBindViewHolder: called.");

        Glide.with(mContext)
                .asBitmap()
                .load(mImages.get(position));



        if (isNetworkAvailable(mContext)){
            holder.imageName.setText(mImageNames.get(position));
            holder.res_valor.setText(mValor.get(position));
            holder.res_ganhos.setText(mGanhos.get(position));
            holder.res_descontados.setText(mDescontados.get(position));
            holder.id_estabelecimento.setText(mEstabelecimento.get(position));
            } else {
            SharedPreferences sharedPreferencesload = mContext.getSharedPreferences(SHARED_PREFS, Context.MODE_PRIVATE);
            String var = sharedPreferencesload.getString(TEXT,"");
            holder.imageName.setText(var);
            holder.res_valor.setText(var);
            holder.res_ganhos.setText(var);
            holder.res_descontados.setText(var);
            holder.id_estabelecimento.setText(var);


        }
        holder.parentLayout.setOnClickListener(new View.OnClickListener() {

            @Override
            public void onClick(View view) {
                Log.d(TAG, "onClick: clicked on: " + mImageNames.get(position));

                Toast.makeText(mContext, mImageNames.get(position), Toast.LENGTH_SHORT).show();

                //alguma cena ....
                //Intent intent = new Intent(mContext, GalleryActivity.class);
                //intent.putExtra("image_url", mImages.get(position));
                //intent.putExtra("image_name", mImageNames.get(position));
                //mContext.startActivity(intent);
            }
        });
    }

    @Override
    public int getItemCount() {
        return mImageNames.size();
    }

    //Recicla as views....
    public class ViewHolder extends RecyclerView.ViewHolder{

        CircleImageView image;
        TextView imageName;
        TextView res_valor;
        TextView res_ganhos;
        TextView res_descontados;
        TextView id_estabelecimento;
        RelativeLayout parentLayout;

        public ViewHolder(View itemView) {
            super(itemView);
            imageName = itemView.findViewById(R.id.image_name);
            res_valor = itemView.findViewById(R.id.res_valor);
            res_ganhos = itemView.findViewById(R.id.res_ganhos);
            res_descontados = itemView.findViewById(R.id.res_descontados);
            id_estabelecimento = itemView.findViewById(R.id.id_estabelecimento);
            parentLayout = itemView.findViewById(R.id.parent_layout);
        }
    }




    public boolean isNetworkAvailable(Context context) {
        ConnectivityManager connectivity =(ConnectivityManager) context.getSystemService(Context.CONNECTIVITY_SERVICE);

        if (connectivity == null) {
            return false;
        } else {
            NetworkInfo[] info = connectivity.getAllNetworkInfo();
            if (info != null) {
                for (int i = 0; i < info.length; i++) {
                    if (info[i].getState() == NetworkInfo.State.CONNECTED) {
                        return true;
                    }
                }
            }
        }
        return false;
    }


}