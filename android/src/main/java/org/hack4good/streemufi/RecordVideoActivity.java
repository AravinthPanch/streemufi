package org.hack4good.streemufi;

import android.app.Activity;
import android.content.Intent;
import android.net.Uri;
import android.os.Bundle;
import android.provider.MediaStore;
import android.util.Log;
import android.view.View;
import android.widget.EditText;
import android.widget.VideoView;

public class RecordVideoActivity extends Activity {

    public static final int ACTION_TAKE_VIDEO = 1;

    private EditText urlEditText;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.record_video);
        setTitle("Step 1 - Record Video");

        urlEditText= (EditText) findViewById(R.id.url);

        findViewById(R.id.recButton).setOnClickListener(new View.OnClickListener() {


            @Override
            public void onClick(View v) {

                Intent takeVideoIntent = new Intent(RecordVideoActivity.this,com.google.ytdl.MainActivity.class);
                //Intent takeVideoIntent = new Intent(MediaStore.ACTION_VIDEO_CAPTURE);
                startActivityForResult(takeVideoIntent, ACTION_TAKE_VIDEO);
            }
        });

        findViewById(R.id.nextButton).setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                App.actArtist.url=urlEditText.getText().toString();
                Intent intent = new Intent(RecordVideoActivity.this, EditDataActivity.class);
                startActivity(intent);
            }
        });

        findViewById(R.id.browseButton).setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                String url = "http://www.youtube.com";
                Intent i = new Intent(Intent.ACTION_VIEW);
                i.setData(Uri.parse(url));
                startActivity(i);
            }
        });



        String textExtra = getIntent().getStringExtra(Intent.EXTRA_TEXT);
        if (textExtra !=null) {
            urlEditText.setText(textExtra);
        }
    }

    @Override
    protected void onActivityResult(int requestCode, int resultCode, Intent data) {
        super.onActivityResult(requestCode, resultCode, data);

        if (data==null) { // no data - no processing
            return;
        }

        if (requestCode==ACTION_TAKE_VIDEO)  {
            Uri data1 = data.getData();
            Log.i("","datauri" + data1);
            /*VideoView view= (VideoView) findViewById(R.id.videoView);
            view.setVideoURI(data1);
            view.start();*/
        }
    }

}
