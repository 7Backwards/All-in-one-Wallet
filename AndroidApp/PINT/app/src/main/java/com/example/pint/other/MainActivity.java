package com.example.pint.other;

import android.app.Activity;
import android.content.Intent;
import android.content.pm.PackageInfo;
import android.content.pm.PackageManager;
import android.content.pm.Signature;
import android.support.annotation.NonNull;
import android.support.annotation.Nullable;
import android.support.design.widget.BottomNavigationView;
import android.support.v4.app.Fragment;
import android.support.v4.app.FragmentTransaction;
import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.support.v7.widget.GridLayoutManager;
import android.support.v7.widget.RecyclerView;
import android.util.Base64;
import android.util.Log;
import android.view.KeyEvent;
import android.view.MenuItem;
import android.widget.Button;
import android.widget.Toast;

import com.android.volley.Request;
import com.android.volley.RequestQueue;
import com.android.volley.Response;
import com.android.volley.VolleyError;
import com.android.volley.toolbox.StringRequest;
import com.android.volley.toolbox.Volley;
import com.example.pint.Campanha.CampanhasFragment;
import com.example.pint.Campanha.RecyclerViewAdapterCamp;
import com.example.pint.Carteira.CarteiraFragment;
import com.example.pint.Mapa.MapaFragment;
import com.example.pint.Movimentos.MovimentosFragment;
import com.example.pint.Perfil.PerfilFragment;
import com.example.pint.R;
import com.firebase.ui.auth.AuthUI;
import com.firebase.ui.auth.IdpResponse;
import com.google.firebase.auth.FirebaseAuth;
import com.google.firebase.auth.FirebaseUser;

import org.json.JSONArray;
import org.json.JSONException;
import org.json.JSONObject;

import java.security.MessageDigest;
import java.security.NoSuchAlgorithmException;
import java.util.Arrays;
import java.util.HashMap;
import java.util.List;
import java.util.Map;

import static com.google.android.gms.common.internal.safeparcel.SafeParcelable.NULL;

public class MainActivity extends AppCompatActivity {

    //LOGIN
    private static final int MY_REQUEST_CODE = 7117; //qualquer nr aqui servia
    List<AuthUI.IdpConfig> providers;
    Button btn_sign_out;
    FirebaseAuth firebaseAuth;
    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_main);

        providers = Arrays.asList(
                new AuthUI.IdpConfig.EmailBuilder().build(),

                new AuthUI.IdpConfig.PhoneBuilder().build(),

                new AuthUI.IdpConfig.FacebookBuilder().build(),

                new AuthUI.IdpConfig.GoogleBuilder().build()
        );


        firebaseAuth = firebaseAuth.getInstance();
        FirebaseUser firebaseUser = FirebaseAuth.getInstance().getCurrentUser();
        if(firebaseUser==null){
            showSignInOptions();
        }
        else {
            startCarteira();
        }

        //Bottom Nav
        BottomNavigationView bottomNav = findViewById(R.id.bottom_navigation);
        bottomNav.setOnNavigationItemSelectedListener(navListener);


    }

    //Bottom Nav
    private BottomNavigationView.OnNavigationItemSelectedListener navListener =
            new BottomNavigationView.OnNavigationItemSelectedListener() {
                @Override
                public boolean onNavigationItemSelected(@NonNull MenuItem item) {
                    Fragment selectedFragment = null;

                    switch (item.getItemId()) {
                        case R.id.nav_campanhas:
                            selectedFragment = new CampanhasFragment();
                            break;
                        case R.id.nav_carteira:
                            selectedFragment = new CarteiraFragment();
                            break;
                        case R.id.nav_perfil:
                            selectedFragment = new PerfilFragment();
                            break;
                        case R.id.nav_movimentos:
                            selectedFragment = new MovimentosFragment();
                            break;
                        case R.id.nav_explore:
                            selectedFragment = new MapaFragment();
                            break;
                    }
                    getSupportFragmentManager().beginTransaction().setCustomAnimations(R.anim.enter_left_to_right, R.anim.exit_left_to_right).replace(R.id.fragment_container, selectedFragment).commit();

                    return true;
                }
            };


    private void showSignInOptions() {
        startActivityForResult(
                AuthUI.getInstance().createSignInIntentBuilder()
                        .setAvailableProviders(providers)
                        .setLogo(R.drawable.logopint)
                        .setTheme(R.style.AppTheme)
                        .setIsSmartLockEnabled(false, true)
                        .setTosAndPrivacyPolicyUrls(
                                "https://example.com/terms.html",
                                "https://example.com/privacy.html")

                        .build(), MY_REQUEST_CODE
        );

    }

    private void startCarteira() {
        CarteiraFragment fragment = new CarteiraFragment();
        FragmentTransaction transaction = getSupportFragmentManager().beginTransaction();
        transaction.replace(R.id.fragment_container, fragment);
        transaction.commit();
    }

    @Override
    protected void onActivityResult(int requestCode, int resultCode, @Nullable Intent data) {
        super.onActivityResult(requestCode, resultCode, data);
        if (requestCode == MY_REQUEST_CODE) {
            IdpResponse response = IdpResponse.fromResultIntent(data);
            if (resultCode == RESULT_OK) {
                //get User
                FirebaseUser user = FirebaseAuth.getInstance().getCurrentUser();
                //show email on toast
                //post
                post(user.getUid(),user.getDisplayName(),user.getEmail(),user.getPhoneNumber());
                //to start the first fragment...
                getSupportFragmentManager().beginTransaction().replace(R.id.fragment_container,new CarteiraFragment()).commit();

            } else {
                finish();
                System.exit(0);

                //Toast.makeText(this, "" +response.getError().getMessage(), Toast.LENGTH_SHORT).show();
            }
        }
    }


    public static String printKeyHash(Activity context) {
        PackageInfo packageInfo;
        String key = null;
        try {
            //getting application package name, as defined in manifest
            String packageName = context.getApplicationContext().getPackageName();

            //Retriving package info
            packageInfo = context.getPackageManager().getPackageInfo(packageName,
                    PackageManager.GET_SIGNATURES);

            Log.e("Package Name=", context.getApplicationContext().getPackageName());

            for (Signature signature : packageInfo.signatures) {
                MessageDigest md = MessageDigest.getInstance("SHA");
                md.update(signature.toByteArray());
                key = new String(Base64.encode(md.digest(), 0));

                // String key = new String(Base64.encodeBytes(md.digest()));
                Log.e("Key Hash=", key);
            }
        } catch (PackageManager.NameNotFoundException e1) {
            Log.e("Name not found", e1.toString());
        } catch (NoSuchAlgorithmException e) {
            Log.e("No such an algorithm", e.toString());
        } catch (Exception e) {
            Log.e("Exception", e.toString());
        }

        return key;
    }


    @Override
    public boolean onKeyDown(int keyCode, KeyEvent event)  {
        if (Integer.parseInt(android.os.Build.VERSION.SDK) < 5
                && keyCode == KeyEvent.KEYCODE_BACK
                && event.getRepeatCount() == 0) {
            Log.d("CDA", "onKeyDown Called");
            onBackPressed();
        }

        return super.onKeyDown(keyCode, event);
    }

    public void onBackPressed() {


        return;
    }

    private void post(final String uid, final String nome, final String email, final String phone){



        String url = "http://193.137.7.33/~estgv16064/PINT_Web/index.php/AndroidController/AdicionarCliente";
        StringRequest postReq = new StringRequest(Request.Method.POST, url,
                new Response.Listener<String>() {
                    @Override
                    public void onResponse(String response) {
                        //Toast.makeText(getActivity(),response,Toast.LENGTH_SHORT).show();
                        try {

                            JSONObject obj = new JSONObject(response);

                            JSONArray array = obj.getJSONArray("campanhas");

                            for (int i = 0; i < array.length(); i++) {

                                //...
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




                params.put("id",uid);
                params.put("email",email);
                params.put("telemovel",phone);
                params.put("nome",nome);



                    if(uid == null){
                        params.put("id","0");
                    }
                    if(email == null){
                        params.put("email","0");
                    }
                    if(phone == null){
                        params.put("telemovel","0");
                    }
                    if(nome==null){
                    params.put("nome","0");
                }








                return params;
            }
        };
        RequestQueue queue;
        queue =(RequestQueue) Volley.newRequestQueue(MainActivity.this);
        queue.add(postReq);
    }






}

