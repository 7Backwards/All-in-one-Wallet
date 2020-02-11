package com.example.pint.Mapa;

import android.content.Intent;
import android.os.Bundle;
import android.support.annotation.NonNull;
import android.support.annotation.Nullable;
import android.support.v4.app.Fragment;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;

import com.example.pint.Carteira.CarteiraFragment;
import com.example.pint.R;

public class MapaFragment extends Fragment {


    @Nullable
    @Override
    public View onCreateView(@NonNull LayoutInflater inflater, @Nullable ViewGroup container, @Nullable Bundle savedInstanceState) {
        View v= inflater.inflate(R.layout.fragment_mapa,container,false);
        Intent intent = new Intent(getActivity(), PermissionsActicity.class);
        startActivity(intent);

        getFragmentManager().beginTransaction().setCustomAnimations(R.anim.enter_left_to_right, R.anim.exit_left_to_right).replace(R.id.fragment_container, new CarteiraFragment()).commit();

        //getFragmentManager().beginTransaction().replace(R.id.fragment_container,new CarteiraFragment()).commit();


        return v;
    }



}
