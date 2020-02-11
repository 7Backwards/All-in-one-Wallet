package com.example.pint.Carteira;

import android.app.AlertDialog;
import android.app.Dialog;
import android.content.DialogInterface;
import android.content.Intent;
import android.graphics.Bitmap;
import android.os.Bundle;
import android.support.v4.app.DialogFragment;
import android.support.v7.app.AppCompatActivity;
import android.support.v7.widget.GridLayoutManager;
import android.support.v7.widget.RecyclerView;
import android.view.View;
import android.widget.Button;
import android.widget.EditText;
import android.widget.ImageView;
import android.widget.TextView;
import android.widget.Toast;

import com.android.volley.Request;
import com.android.volley.RequestQueue;
import com.android.volley.Response;
import com.android.volley.VolleyError;
import com.android.volley.toolbox.StringRequest;
import com.android.volley.toolbox.Volley;
import com.example.pint.Campanha.RecyclerViewAdapterCamp;
import com.example.pint.Perfil.Client;
import com.example.pint.R;
import com.google.firebase.auth.FirebaseAuth;
import com.google.firebase.auth.FirebaseUser;
import com.google.zxing.BarcodeFormat;
import com.google.zxing.MultiFormatWriter;
import com.google.zxing.WriterException;
import com.google.zxing.common.BitMatrix;
import com.journeyapps.barcodescanner.BarcodeEncoder;

import org.json.JSONArray;
import org.json.JSONException;
import org.json.JSONObject;

import java.util.ArrayList;
import java.util.HashMap;
import java.util.List;
import java.util.Map;

public class GeneratorActivity extends AppCompatActivity {
    //post
    List<Info> Info;


    public ArrayList<String> mNOME_ESTABELECIMENTO = new ArrayList<>();




    //private String id = "1";

    FirebaseUser user = FirebaseAuth.getInstance().getCurrentUser();
    private String id =user.getUid();


    private String qra="a";
    private String paramed;
    EditText text;
    TextView gen_btn;
    ImageView image;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_generator);
        text = (EditText) findViewById(R.id.text);


        //para as findviews...


        //get extra
        Intent intent = getIntent();
        final String param = intent.getStringExtra("param");

        final String param2 = intent.getStringExtra("param2");
        final String parampos = intent.getStringExtra("parampos");
        //String name = intent.getStringExtra("name");
        //----


        //-----DELETE CARD BUTTON-------
        Button button = findViewById(R.id.killcard);
        button.setOnClickListener(new View.OnClickListener() {
            public void onClick(View v) {
                Bundle bundle = new Bundle();
                bundle.putString("param", param);

                DeleteDialog deleteDialog = new DeleteDialog();
                deleteDialog.setArguments(bundle);
                deleteDialog.show(getSupportFragmentManager(), "delete");
            }
        });
        //----------------------------------
        Button movs = findViewById(R.id.cardmovs);
        movs.setOnClickListener(new View.OnClickListener() {
            public void onClick(View v) {
                Bundle bundle = new Bundle();
                bundle.putString("param", param);
                Intent intent = new Intent(GeneratorActivity.this,MovsActivity.class);
                startActivity(intent);


            }
        });
        //----------------------------------


        //------DELETE----------------
        image = (ImageView) findViewById(R.id.image_gen);

        MultiFormatWriter multiFormatWriter = new MultiFormatWriter();

        try {
            BitMatrix bitMatrix = multiFormatWriter.encode(/*qra+id*/ param2, BarcodeFormat.QR_CODE, 200, 200);
            BarcodeEncoder barcodeEncoder = new BarcodeEncoder();
            Bitmap bitmap = barcodeEncoder.createBitmap(bitMatrix);
            image.setImageBitmap(bitmap);
        } catch (WriterException e) {
            e.printStackTrace();
        }


    //______________POST_________________________

    //----INITIAL POST FOR INFO

    String url = "http://193.137.7.33/~estgv16064/PINT_Web/index.php/AndroidController/get_cartoes_informacao";
    StringRequest postReq = new StringRequest(Request.Method.POST, url,
            new Response.Listener<String>() {
                @Override
                public void onResponse(String response) {
                    try {

                        Info = new ArrayList<>();

                        JSONObject obj = new JSONObject(response);
                        JSONArray array = obj.getJSONArray("cartoes");

                        for (int i = 0; i < array.length(); i++) {
                            Info.add(new Info(
                                    array.getJSONObject(i).getString("PONTOS_CARTAO"),
                                    array.getJSONObject(i).getString("NOTIFICACAO_ESTABELECIMENTO"),
                                    array.getJSONObject(i).getString("date_creation"),
                                    array.getJSONObject(i).getString("NOME_ESTABELECIMENTO"),
                                    array.getJSONObject(i).getString("CIDADE_ESTABELECIMENTO"),
                                    array.getJSONObject(i).getString("MORADA_ESTABELECIMENTO"),
                                    array.getJSONObject(i).getString("DESCRICAO_ESTABELECIMENTO"),
                                    array.getJSONObject(i).getString("ganhar_pontos"),
                                    array.getJSONObject(i).getString("usar_pontos"),
                                    array.getJSONObject(i).getString("ID_CARTAO")
                            ));
                            String tmpStr10 = String.valueOf(i);
                            if(tmpStr10.equals(parampos)){
                                TextView text=(TextView)findViewById(R.id.gato_nome_estabelecimento);
                                text.setText(array.getJSONObject(i).getString("NOME_ESTABELECIMENTO"));

                                TextView text2=(TextView)findViewById(R.id.gato_pontos_cartao);
                                text2.setText(array.getJSONObject(i).getString("PONTOS_CARTAO"));

                                TextView text3=(TextView)findViewById(R.id.gato_date_creation);
                                text3.setText(array.getJSONObject(i).getString("date_creation"));

                                TextView text4=(TextView)findViewById(R.id.gato_cidade_estabelecimento);
                                text4.setText(array.getJSONObject(i).getString("CIDADE_ESTABELECIMENTO"));

                                TextView text5=(TextView)findViewById(R.id.gato_morada);
                                text5.setText(array.getJSONObject(i).getString("MORADA_ESTABELECIMENTO"));


                                TextView text6=(TextView)findViewById(R.id.gato_descricao);
                                text6.setText(array.getJSONObject(i).getString("DESCRICAO_ESTABELECIMENTO"));


                                TextView text7=(TextView)findViewById(R.id.gato_id_cartao);
                                text7.setText(array.getJSONObject(i).getString("ID_CARTAO"));

                            }





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
            params.put("id", id);
            return params;

        }
    };

    RequestQueue queue;
    queue =(RequestQueue)Volley.newRequestQueue(this);
    queue.add(postReq);


    //______________POST_________________________





    }

}
