package org.hack4good.streemufi.upload;

import org.hack4good.streemufi.model.Artist;

public class HappyMockDataUploadService implements DataUploadService {
    @Override
    public void uploadArtist(Artist artist, SuccessCallback successCallback, FailCallback failCallback) {
        successCallback.onSuccess();
    }
}
