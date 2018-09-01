package com.wangjie.device;

import android.Manifest;
import android.content.Context;
import android.content.pm.PackageManager;
import android.os.Bundle;
import android.provider.Settings;
import android.support.annotation.NonNull;
import android.support.v4.app.ActivityCompat;
import android.support.v4.content.ContextCompat;
import android.support.v7.app.AppCompatActivity;
import android.telephony.TelephonyManager;
import android.widget.TextView;

import java.net.NetworkInterface;
import java.net.SocketException;

public class MainActivity extends AppCompatActivity {

    private TextView mTvImei;
    private TextView mTvMac;
    private TextView mTvAndroidId;

    public static final int REQ_PERMISSION_READ_PHONE_STATE = 1;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_main);
        mTvImei = findViewById(R.id.tv_imei);
        mTvMac = findViewById(R.id.tv_mac);
        mTvAndroidId = findViewById(R.id.tv_androidid);

        mTvImei.append(getImei(this));
        mTvMac.append(getMac(this));
        mTvAndroidId.append(getAndroidId(this));

        if(ContextCompat.checkSelfPermission(this, Manifest.permission.READ_PHONE_STATE) != PackageManager.PERMISSION_GRANTED){
            String[] permission = {Manifest.permission.READ_PHONE_STATE};
            ActivityCompat.requestPermissions(this, permission, REQ_PERMISSION_READ_PHONE_STATE);
        }
    }

    @Override
    public void onRequestPermissionsResult(int requestCode, @NonNull String[] permissions, @NonNull int[] grantResults) {
        super.onRequestPermissionsResult(requestCode, permissions, grantResults);
        if(requestCode == REQ_PERMISSION_READ_PHONE_STATE && grantResults[0] == PackageManager.PERMISSION_GRANTED){
            mTvImei.append(getImei(this));
        }
    }

    private String getImei(Context context){
        String imei = "";
        try {
            TelephonyManager manager = (TelephonyManager) context.getSystemService(Context.TELEPHONY_SERVICE);
            if(ContextCompat.checkSelfPermission(context, Manifest.permission.READ_PHONE_STATE) == PackageManager.PERMISSION_GRANTED){
                imei = manager.getDeviceId();
            }
        }catch (Exception e){

        }
        return imei;
    }

    private String getMac(Context context){
        String macAddress = null;
        StringBuffer buf = new StringBuffer();
        NetworkInterface networkInterface = null;
        try {
            networkInterface = NetworkInterface.getByName("eth1");
            if (networkInterface == null) {
                networkInterface = NetworkInterface.getByName("wlan0");
            }
            if (networkInterface == null) {
                return "02:00:00:00:00:02";
            }
            byte[] addr = networkInterface.getHardwareAddress();
            for (byte b : addr) {
                buf.append(String.format("%02X:", b));
            }
            if (buf.length() > 0) {
                buf.deleteCharAt(buf.length() - 1);
            }
            macAddress = buf.toString();
        } catch (SocketException e) {
            e.printStackTrace();
            return "02:00:00:00:00:02";
        }
        return macAddress;
    }

    private String getAndroidId(Context context){
        String id = "";
        try{
            id = Settings.Secure.getString(context.getContentResolver(), Settings.Secure.ANDROID_ID);
        }catch (Exception e){

        }
        return id;
    }
}
