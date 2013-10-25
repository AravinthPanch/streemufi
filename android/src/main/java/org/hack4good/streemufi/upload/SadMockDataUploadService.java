package org.hack4good.streemufi.upload;

import org.hack4good.streemufi.model.Artist;

public class SadMockDataUploadService implements DataUploadService {
    @Override
    public void uploadArtist(Artist artist, SuccessCallback successCallback, FailCallback failCallback) {
        failCallback.onFail();
    }
}
