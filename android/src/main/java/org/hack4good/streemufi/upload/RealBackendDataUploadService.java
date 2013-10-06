package org.hack4good.streemufi.upload;

import android.os.AsyncTask;

import org.apache.http.HttpResponse;
import org.apache.http.client.ClientProtocolException;
import org.apache.http.client.HttpClient;
import org.apache.http.client.methods.HttpPost;
import org.apache.http.entity.StringEntity;
import org.apache.http.impl.client.DefaultHttpClient;
import org.apache.http.util.EntityUtils;
import org.hack4good.streemufi.Config;
import org.hack4good.streemufi.model.Artist;

import java.io.IOException;
import java.io.UnsupportedEncodingException;

public class RealBackendDataUploadService implements DataUploadService {

    @Override
    public void uploadArtist(final Artist artist, final SuccessCallback successCallback, final FailCallback failCallback) {
        new AsyncTask<Void,Void,Void>() {

            private boolean success=false;
            private String result;

            @Override
            protected void onPostExecute(Void aVoid) {
                super.onPostExecute(aVoid);
                if (success) {
                    successCallback.onSuccess(result);
                } else {
                    failCallback.onFail();
                }
            }


            @Override
            protected Void doInBackground(Void... params) {

                HttpClient httpclient = new DefaultHttpClient();
                HttpPost httppost = new HttpPost(Config.BACKEND_URL+"artist");

                try {
                    httppost.setEntity(new StringEntity(artist.toJSONString()));
                    HttpResponse resp = httpclient.execute(httppost);

                    result=EntityUtils.toString(resp.getEntity());
                    if (resp.getStatusLine().getStatusCode()==200) {
                        success=true;
                    }

                } catch (UnsupportedEncodingException e) {
                    success=false;
                } catch (ClientProtocolException e) {
                    success=false;
                } catch (IOException e) {
                    success=false;
                }

                return null;
            }
        }.execute();

    }

}
