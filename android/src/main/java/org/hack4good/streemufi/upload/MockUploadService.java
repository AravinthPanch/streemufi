package org.hack4good.streemufi.upload;

public class MockUploadService implements UploadService {

    /**
     * @return the URL for the Video
     */
    public String uploadVideo() {
        return "http://www.youtube.com/watch?v=Us-TVg40ExM";
    }
}
