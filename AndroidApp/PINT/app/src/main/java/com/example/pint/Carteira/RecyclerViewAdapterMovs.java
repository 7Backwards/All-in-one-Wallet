package com.example.pint.Carteira;

import android.content.Context;
import android.content.SharedPreferences;
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
import java.util.List;

import de.hdodenhof.circleimageview.CircleImageView;

import static com.example.pint.Movimentos.MovimentosFragment.SHARED_PREFS;
import static com.example.pint.Movimentos.MovimentosFragment.TEXT;


public class RecyclerViewAdapterMovs extends RecyclerView.Adapter<RecyclerViewAdapterMovs.ViewHolder>{





    //_____

    private static final String TAG = "RecyclerViewAdapter";


    private Context mContext;
    List<Movs> Movs;


    //vai buscar as variaveis por nos
    public RecyclerViewAdapterMovs(Context context, List<Movs> Movs ) {
        this.Movs = Movs;
        this.mContext = context;
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

        holder.mov_imageName.setText(Movs.get(position).getESTABELECIMENTO_NOME());
        holder.mov_res_valor.setText(Movs.get(position).getVALOR_TRANSACAO());
        holder.mov_res_ganhos.setText(Movs.get(position).getPONTOS_GANHOS());
        holder.mov_res_descontados.setText(Movs.get(position).getPONTOS_DESCONTADOS());
        holder.mov_id_estabelecimento.setText(Movs.get(position).getESTABELECIMENTO_NOME());
        holder.mov_parentLayout.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {

            }
        });
    }

    @Override
    public int getItemCount() {
        return /*mImageNames.size()*/0;
    }

    //Recicla as views....
    public class ViewHolder extends RecyclerView.ViewHolder{

        CircleImageView image;
        TextView mov_imageName;
        TextView mov_res_valor;
        TextView mov_res_ganhos;
        TextView mov_res_descontados;
        TextView mov_id_estabelecimento;
        RelativeLayout mov_parentLayout;

        public ViewHolder(View itemView) {
            super(itemView);
            mov_imageName = itemView.findViewById(R.id.mov_image_name);
            mov_res_valor = itemView.findViewById(R.id.mov_res_valor);
            mov_res_ganhos = itemView.findViewById(R.id.mov_res_ganhos);
            mov_res_descontados = itemView.findViewById(R.id.mov_res_descontados);
            mov_id_estabelecimento = itemView.findViewById(R.id.mov_id_estabelecimento);
            mov_parentLayout = itemView.findViewById(R.id.mov_parent_layout);
        }
    }





}