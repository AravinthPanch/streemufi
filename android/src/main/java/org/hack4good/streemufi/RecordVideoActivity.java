package org.hack4good.streemufi;

import android.app.Activity;
import android.content.Intent;
import android.net.Uri;
import android.os.Bundle;
import android.provider.MediaStore;
import android.util.Log;
import android.view.View;
import android.widget.VideoView;

public class RecordVideoActivity extends Activity {

    public static final int ACTION_TAKE_VIDEO = 1;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.record_video);
        setTitle("Step 1 - Record Video");

        findViewById(R.id.recButton).setOnClickListener(new View.OnClickListener() {


            @Override
            public void onClick(View v) {
                Intent takeVideoIntent = new Intent(MediaStore.ACTION_VIDEO_CAPTURE);
                startActivityForResult(takeVideoIntent, ACTION_TAKE_VIDEO);
            }
        });

        findViewById(R.id.nextButton).setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                Intent intent = new Intent(RecordVideoActivity.this, UploadVideoActivity.class);
                startActivity(intent);
            }
        });
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
            VideoView view= (VideoView) findViewById(R.id.videoView);
            view.setVideoURI(data1);
            view.start();
        }
    }

}
