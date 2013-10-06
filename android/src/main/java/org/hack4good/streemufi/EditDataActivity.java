package org.hack4good.streemufi;

import android.app.Activity;
import android.app.AlertDialog;
import android.content.Context;
import android.content.DialogInterface;
import android.content.Intent;
import android.net.Uri;
import android.os.Bundle;
import android.view.View;
import android.widget.EditText;

import org.hack4good.streemufi.model.Artist;
import org.hack4good.streemufi.upload.DataUploadService;

public class EditDataActivity extends Activity {


    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_edit_data);
        setTitle("Step 2 enter data");

        findViewById(R.id.nextButton).setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {

                copyUI2Artist();
                ServiceLocator.getDataUploadService().uploadArtist(App.actArtist,
                        new DataUploadService.SuccessCallback() {
                            @Override
                            public void onSuccess(final String id) {

                                final String url="http://streemuf.caelum.uberspace.de/artist/"+id;
                                new AlertDialog.Builder(EditDataActivity.this)
                                        .setMessage("Artist is saved " + url)
                                        .setPositiveButton("OK", null)
                                        .setNeutralButton("OPEN", new DialogInterface.OnClickListener() {
                                            @Override
                                            public void onClick(DialogInterface dialog, int which) {
                                                Intent browserIntent = new Intent(Intent.ACTION_VIEW, Uri.parse(url));
                                                startActivity(browserIntent);
                                            }
                                        })
                                        .show();
                            }
                        },
                        new DataUploadService.FailCallback() {
                            @Override
                            public void onFail() {
                                new AlertDialog.Builder(EditDataActivity.this)
                                        .setMessage("There was a problem")
                                        .setPositiveButton("OK", null)
                                        .show();
                            }
                        }
                );

//                Intent intent = new Intent(EditDataActivity.this, UploadVideoActivity.class);
                //               startActivity(intent);
            }
        });
    }

    private void copyUI2Artist() {
        Artist artist = App.actArtist;

        EditText name = (EditText) findViewById(R.id.name);
        EditText contact = (EditText) findViewById(R.id.contact);
        EditText text = (EditText) findViewById(R.id.notes);

        artist.name = name.getText().toString();
        artist.contact = contact.getText().toString();
        artist.text = text.getText().toString();
    }

}
